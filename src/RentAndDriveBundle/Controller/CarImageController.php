<?php

namespace RentAndDriveBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use RentAndDriveBundle\Entity\CarImage;
use RentAndDriveBundle\Form\CarImageType;

/**
 * CarImage controller.
 *
 * @Route("/admin/car_images")
 */
class CarImageController extends Controller
{

    /**
     * Lists all CarImage entities.
     *
     * @Route("/", name="admin_car_images")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RentAndDriveBundle:CarImage')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new CarImage entity.
     *
     * @Route("/", name="admin_car_images_create")
     * @Method("POST")
     * @Template("RentAndDriveBundle:CarImage:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new CarImage();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity->upload();
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_car_images_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a CarImage entity.
     *
     * @param CarImage $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(CarImage $entity)
    {
        $form = $this->createForm(new CarImageType(), $entity, array(
            'action' => $this->generateUrl('admin_car_images_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CarImage entity for a specific car.
     *
     * @Route("/new/{car_id}", name="admin_car_images_new_by_car")
     * @Method("GET")
     * @Template("@RentAndDriveBundle/Resources/views/CarImage/new.html.twig")
     */
    public function newByIDAction($car_id)
    {
        $entity = new CarImage();
        $car = $this->getDoctrine()->getManager()->getRepository('RentAndDriveBundle:Car')->find($car_id);

        $entity->setCar($car);
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a CarImage entity.
     *
     * @Route("/{id}", name="admin_car_images_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RentAndDriveBundle:CarImage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CarImage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing CarImage entity.
     *
     * @Route("/{id}/edit", name="admin_car_images_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RentAndDriveBundle:CarImage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CarImage entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a CarImage entity.
    *
    * @param CarImage $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CarImage $entity)
    {
        $form = $this->createForm(new CarImageType(), $entity, array(
            'action' => $this->generateUrl('admin_car_images_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CarImage entity.
     *
     * @Route("/{id}", name="admin_car_images_update")
     * @Method("PUT")
     * @Template("RentAndDriveBundle:CarImage:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RentAndDriveBundle:CarImage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CarImage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->upload();
            $em->flush();

            return $this->redirect($this->generateUrl('admin_car_images_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a CarImage entity.
     *
     * @Route("/delete/{id}", name="admin_car_images_delete")
     */
    public function deleteAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('RentAndDriveBundle:CarImage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CarImage entity.');
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_car_images'));
    }

    /**
     * Creates a form to delete a CarImage entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_car_images_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
