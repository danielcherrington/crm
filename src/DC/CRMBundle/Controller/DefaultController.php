<?php

namespace DC\CRMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;


// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="_demo")
     * @Template()
     */
    public function indexAction()
    {
        return array("var" => "test");
    }


}
