<?php

namespace DC\CRMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{ 
    private $_module;

    public function indexAction()
    {
        $dashboard = $this->get("dashboard_manager");

        return $this->render(
    		'DCCRMBundle:Default:index.html.twig',
    		array("dashboard" => $dashboard)
		);
    }

    public function ajaxAction($method = "", $params = "")
    {
        if(empty($method)){
            $method = $this->get("request")->get("method");
            $params = $this->get("request")->get("params");
        }

        $ajaxHelper = $this->get("ajax_helper");
        $response = $ajaxHelper->execute($method, $params);

        return new Response($response);
    }

    public function listAction($module)
    {

    	$this->_module = $module;

    	$modulesHelper = $this->get("modules_helper");
    	$entity_map = $modulesHelper->getEntityMap();

    	$em = $this->getDoctrine()->getManager();

        $records = $em->getRepository('DCCRMBundle:'.$entity_map[$module])->findAll();
        $metadata = $this->get("metadata_manager")->getMetaData($module, "list");

	    $form = $this->createFormBuilder();

	    foreach($metadata['search']['fields'] as $field){

	    	$form->add($field['name'], $field['type'], $field['options']);
	    }

	    $form->add("Search", "submit");
	    $form = $form->getForm();

        return $this->render(
    		'DCCRMBundle:'.$module.':index.html.twig',
    		array(
    			'records' => $records, 
    			'module' => $module, 
    			'metadata' => $metadata, 
    			'form' => $form->createView()
    		)
		);
    }

    public function editAction($module, $id)
    {
    	$this->_module = $module;

        $em = $this->getDoctrine()->getManager();
        $modulesHelper = $this->get("modules_helper");
    	$entity_map = $modulesHelper->getEntityMap();

        $entity = $em->getRepository('DCCRMBundle:'.$entity_map[$module])->find($id);
        $metadata = $this->get("metadata_manager")->getMetaData($module, "edit");

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find entity.');
        }

        $editForm = $this->createEditForm($entity, $entity_map[$module]);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DCCRMBundle:'.$module.':edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'module'    => $module,
            'metadata'    => $metadata,
            'delete_form' => $deleteForm->createView(),
        ));
    }

        /**
     * Finds and displays a Account entity.
     *
     */
    public function showAction($module, $id)
    {
    	$this->_module = $module;
        $em = $this->getDoctrine()->getManager();
        $modulesHelper = $this->get("modules_helper");
    	$entity_map = $modulesHelper->getEntityMap();

        $entity = $em->getRepository('DCCRMBundle:'.$entity_map[$module])->find($id);
        $metadata = $this->get("metadata_manager")->getMetaData($module, "show");

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DCCRMBundle:'.$module.':show.html.twig', array(
            'entity'      => $entity,
            'metadata'    => $metadata,
            'module' 	=> $module,
            'delete_form' => $deleteForm->createView(),        ));
    }

     /**
     * Displays a form to create a new Account entity.
     *
     */
    public function newAction($module)
    {
    	$this->_module = $module;
    	$modulesHelper = $this->get("modules_helper");
    	$class = $modulesHelper->getEntityClass($module);
    	$entity_map = $modulesHelper->getEntityMap();
        $metadata = $this->get("metadata_manager")->getMetaData($module, "edit");

        $entity = new $class();
        $editForm   = $this->createCreateForm($entity, $entity_map[$module]);

        return $this->render('DCCRMBundle:'.$module.':edit.html.twig', array(
            'entity' => $entity,
            'module' => $module,
            'metadata' => $metadata,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Persists the entity submited from the new view.
     *
     */
    public function createAction(Request $request, $module)
    {
        $this->_module = $module;
        $modulesHelper = $this->get("modules_helper");
        $class = $modulesHelper->getEntityClass($module);
        $entity_map = $modulesHelper->getEntityMap();

        $entity = new $class();
        $form = $this->createCreateForm($entity, $entity_map[$module]);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('_show', array('module' => $module, 'id' => $entity->getId())));
        }

        return $this->render('DCCRMBundle:'.$module.':new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function updateAction(Request $request, $module, $id)
    {
        $this->_module = $module;
        $em = $this->getDoctrine()->getManager();
        $modulesHelper = $this->get("modules_helper");
        $entity_map = $modulesHelper->getEntityMap();

        $metadata = $this->get("metadata_manager")->getMetaData($module, "edit");
        $entity = $em->getRepository('DCCRMBundle:'.$entity_map[$module])->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find entity.');
        }

        $editForm = $this->createEditForm($entity, $entity_map[$module]);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('_show', array('module' => $this->_module, 'id' => $id)));
        }

        return $this->render('DCCRMBundle:'.$module.':edit.html.twig', array(
            'entity'      => $entity,
            'module'      => $module,
            'metadata'    => $metadata,
            'edit_form'   => $editForm->createView()
        ));
    }

    public function getEntitiesAjaxAction($module)
    {
        $data = array("test","test");

        return new JsonResponse($data);

    }

    /**
    * Creates a form to edit a Account entity.
    *
    * @param Account $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm($entity, $type)
    {

    	$type = "DC\CRMBundle\Form\\".ucfirst("base")."Type";
        $typeObj = new $type($entity, $this->get("vardef_manager"));
        $typeObj->setContainer($this->get('service_container'));

        $form = $this->createForm($typeObj, $entity, array(
            'action' => $this->generateUrl('_update', array('module' => $this->_module, 'id' => $entity->getId())),
            'method' => 'PUT',
        ));

        return $form;
    }

     /**
     * Creates a form to delete a Account entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('_delete', array('module' => $this->_module, 'id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }


    /**
    * Creates a form to create a Account entity.
    *
    * @param Account $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm($entity, $type)
    {
    	$type = "DC\CRMBundle\Form\\".ucfirst("base")."Type";
        $typeObj = new $type($entity, $this->get("vardef_manager"));
        $typeObj->setContainer($this->get('service_container'));

        $form = $this->createForm($typeObj, $entity, array(
            'action' => $this->generateUrl('_create', array('module' => $this->_module)),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }


}