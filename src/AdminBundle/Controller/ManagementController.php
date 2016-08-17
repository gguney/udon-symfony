<?php

namespace AdminBundle\Controller;

use Symfony\Component\DomCrawler\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AdminBundle\Entity\Management;
use AdminBundle\Repository\ManagementRepository;
use AdminBundle\Form\ManagementType;

use AdminBundle\Validator\Validator;

/**
 * Management controller.
 *
 */
class ManagementController extends Controller
{
    /**
     * Lists all Management entities.
     *
     */

    private $bigTitle = "Management";
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $managements = $em->getRepository('AdminBundle:Management')->index();
        return $this->render('AdminBundle:management/index.html.twig', array(
            'managements' => $managements,
        ));

    }

    /**
     * Creates a new Management entity.
     *
     */
    public function newAction(Request $request)
    {
        $users = $this->getDoctrine()->getEntityManager()->getRepository('AdminBundle:User')->findAll();
        $management = new Management();

        if ($request->getMethod() == "POST") {
            $management = new Management();
            $rules = array(
              'companyName' =>'required|numeric',
                'taxNumber' =>'required',
            );
            $requestManagement = $request->request->get("management");
            $validator = new Validator();
            $validator->validate($requestManagement,$rules);
            dump($requestManagement);
            die;
            $management->setCompanyName($requestManagement["companyName"]);
            $management->setRefOwnerId($requestManagement["refOwnerId"]);
            $em = $this->getDoctrine()->getManager();
            $em->persist($management);
            $em->flush();
            return $this->redirectToRoute('management_show', array('id' => $management->getId()));
        }
        return $this->render('AdminBundle:management/new.html.twig', array(
            'users' => $users,
            'management' => $management,
        ));
    }

    /**
     * Finds and displays a Management entity.
     *
     */
    public function showAction(Management $management)
    {
        $deleteForm = $this->createDeleteForm($management);

        return $this->render('AdminBundle:management/show.html.twig', array(
            'management' => $management,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Management entity.
     *
     */
    public function editAction(Request $request, Management $management)
    {

        $deleteForm = $this->createDeleteForm($management);
        $editForm = $this->createForm('AdminBundle\Form\ManagementType', $management);
        $editForm->handleRequest($request);

        $users = $this->getDoctrine()->getEntityManager()->getRepository('AdminBundle:User')->findAll();
        if ($editForm->isSubmitted()) {
            $refOwnerId= $request->request->all()["management"]["refOwnerId"];
            $em = $this->getDoctrine()->getManager();
            $management->setRefOwnerId($refOwnerId);
            $em->persist($management);
            $em->flush();

            return $this->redirectToRoute('management_index');
        }

        return $this->render('AdminBundle:management/edit.html.twig', array(
            'users' => $users,
            'management' => $management,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));


    }

    /**
     * Deletes a Management entity.
     *
     */
    public function deleteAction(Request $request, Management $management)
    {
        $form = $this->createDeleteForm($management);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($management);
            $em->flush();
        }

        return $this->redirectToRoute('management_index');
    }

    /**
     * Creates a form to delete a Management entity.
     *
     * @param Management $management The Management entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Management $management)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('management_delete', array('id' => $management->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
