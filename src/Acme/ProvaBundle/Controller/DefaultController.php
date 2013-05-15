<?php

namespace Acme\ProvaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeProvaBundle:Default:index.html.twig', array('name' => $name));
    }
}
