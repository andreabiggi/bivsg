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
        $cm = $this->get('bix_category.category_manager');
        $allCat = $cm->findCategories();

        return $this->render('SgCategoryBundle:Default:prova.html.twig', array('allCat' => $allCat));
    }
}
