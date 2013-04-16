<?php

namespace Sg\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SgUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
