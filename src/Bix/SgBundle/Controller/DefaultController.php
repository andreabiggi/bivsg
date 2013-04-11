<?php

namespace Bix\SgBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BixSgBundle:Default:index.html.twig', array('name' => $name));
    }
}
