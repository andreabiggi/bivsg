<?php

namespace Sg\CategoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sg\CategoryBundle\Entity\Category;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SgCategoryBundle:Default:index.html.twig', array('name' => $name));
    }

    public function provaAction()
    {
        $pizza = $this->getDoctrine()
            ->getRepository('SgCategoryBundle:Category')
            ->find(1);

        $nomiPizze = $pizza->getChildrenNames();

        return $this->render('SgCategoryBundle:Default:prova.html.twig', array('nomiPizze' => $nomiPizze));
    }
}
