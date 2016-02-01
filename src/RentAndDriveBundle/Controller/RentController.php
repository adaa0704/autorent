<?php

namespace RentAndDriveBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use RentAndDriveBundle\Entity\Rent;
use RentAndDriveBundle\Entity\Car;
use RentAndDriveBundle\Form\RentType;

class RentController extends Controller
{
    /**
     * @Route("/rent/{car_id}", name="rentCarById")
     * @Method("GET")
     * @Template()
     */
    public function rentAction($car_id)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $entity = new Rent();

        $form   = $this->createCreateForm($entity);

        $em = $this->getDoctrine()->getManager();
        $car = $em->getRepository('RentAndDriveBundle:Car')->find($car_id);


        $success = false;

        if( $car -> isAvailable() )
        {
            $success = true;
            $user->setRequestedCarId( $car->getId() );
            $em->persist($user);
            $em->flush();
        }

        return array(
            'car' => $car,
            'success' => $success,
            'form'   => $form->createView()
            );
    }


    /**
     * @Route("/rent/confirmed", name="rentConfirmed")
     * @Method("POST")
     * @Template("RentAndDriveBundle:Rent:rentConfirmed.html.twig")
     */
    public function rentConfirmedAction(Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();

        $car = $em->getRepository('RentAndDriveBundle:Car')->find( $user->getRequestedCarId() );

        $entity = new Rent();

        $form = $this -> createCreateForm($entity);
        $form->handleRequest($request);

        $days = $entity->getEndingTime()->diff( $entity->getStartingTime() );
        $days = $days->days + 1;
        $price = $days * $car->getPrice();

        $message = "Rent not successful";


        if ($form->isValid() and $car->getAvailable() ) {
            $message = "Successful rent";

            $date = new \DateTime();
            $date->format('Y-m-d');

            $entity
              ->setCar( $car )
              ->setUser( $user )
              ->setActive( true )
              ->setRentRequestDate($date)
              ->setRentPrice($price);

            $car->setAvailable(false);

            $em->persist($entity);
            $em->persist($car);
            $em->flush();
        }


        return array(
            'message' => $message
        );
    }

    /**
     * @Route("/my_rent", name="myRent")
     * @Template()
     */
    public function myRentAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
        $rents = $em->getRepository('RentAndDriveBundle:Rent')->findByUser( $user->getId() );

        $rent = NULL;

        foreach( $rents as $item)
        {
            if( $item->getActive() )
            {
                $rent = $item;
            }
        }

        return array(
            'rent' => $rent
            );
    }

    /**
     * @Route("/admin/rents", name="showRents")
     * @Template()
     */
    public function showRentsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $rents = $em->getRepository('RentAndDriveBundle:Rent')->findBy(array(), array('active' => 'DESC','rentRequestDate' => 'DESC'));

        return array(
            'rents' => $rents
            );
    }

    /**
     * @Route("/admin/rent_end/{rent_id}", name="rentEnd")
     * @Template()
     */
    public function rentEndAction($rent_id)
    {
        $em = $this->getDoctrine()->getManager();
        $rent = $em->getRepository('RentAndDriveBundle:Rent')->find($rent_id);

        $rent->setActive(false);

        $car = $rent->getCar();

        $car->setAvailable(true);

        $em->persist($car);
        $em->persist($rent);

        $em->flush();

        return array(
            );
    }





    /**
     * Creates a form to create a Rent entity.
     *
     * @param Rent $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Rent $entity)
    {
        $form = $this->createForm(new RentType(), $entity, array(
            'action' => $this->generateUrl('rentConfirmed'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Submit'));

        return $form;
    }

}
