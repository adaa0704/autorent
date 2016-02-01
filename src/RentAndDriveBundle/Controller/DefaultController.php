<?php

namespace RentAndDriveBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use RentAndDriveBundle\Entity\Contact;
use RentAndDriveBundle\Form\ContactType;
use RentAndDriveBundle\Form\SearchType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function homepageAction()
    {
        return array();
    }

    /**
     * @Route("/cars", name="availableCars")
     * @Template()
     */
    public function availableCarsAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('RentAndDriveBundle:Car');

        $form = $this->createForm(new SearchType());

        $cars;

        if ($request->isMethod('POST') )
        {
            $form->bind($request);
            $em = $this->getDoctrine()->getEntityManager();

            $onlyAvailable = $form->get('show_only_available')->getData();
            $startingPrice = $form->get('startingPrice')->getData();
            $endingPrice = $form->get('endingPrice')->getData();

            if( !$startingPrice )
                $startingPrice = 1;
            if( !$endingPrice )
                $endingPrice = 999;

            if( $onlyAvailable )
            {
                $query = $em->createQuery('SELECT u FROM RentAndDriveBundle\Entity\Car u 
                                                    WHERE u.price BETWEEN ?1 AND ?2
                                                      AND u.available = TRUE');

                $query->setParameter(1, $startingPrice);
                $query->setParameter(2, $endingPrice);

                $cars = $query->getResult();
            }
            else
            {
                $query = $em->createQuery('SELECT u FROM RentAndDriveBundle\Entity\Car u 
                                                    WHERE u.price BETWEEN ?1 AND ?2');

                $query->setParameter(1, $startingPrice);
                $query->setParameter(2, $endingPrice);

                $cars = $query->getResult();
            }

        }
        else
        {
            $cars = $repository->findByAvailable(true);
            $form->get('show_only_available')->setData(true);
        }
        


        return array(
            'form'=>$form->createView(),
            'cars'=>$cars
            );
    }

    /**
     * @Route("/contact/", name="contact")
     * @Template()
     */
    public function contactAction(Request $request)
    {
        $form = $this->createForm(new ContactType());

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $message = \Swift_Message::newInstance()
                    ->setSubject('Message from contact page')
                    ->setFrom($form->get('email')->getData())
                    ->setTo('rentanddrive.de1231231312v@gmail.com')
                    ->setBody(
                        $this->renderView(
                            'RentAndDriveBundle:Mail:contact.html.twig',
                            array(
                                'ip' => $request->getClientIp(),
                                'name' => $form->get('name')->getData(),
                                'message' => $form->get('message')->getData()
                            )
                        )
                    );

                $this->get('mailer')->send($message);

                $request->getSession()->getFlashBag()->add('success', 'Your email has been sent! Thanks!');

                return $this->redirect($this->generateUrl('contact'));
            }
        }

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/past_transactions", name="pastTransactions")
     * @Template()
     */
    public function pastTransactionsAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $repository = $this->getDoctrine()->getRepository('RentAndDriveBundle:Rent');

        $rents = $repository->findByUser( $user->getId() );

        return array(
            'transactions' => $rents
        );
    }


}
