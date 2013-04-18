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

        $parent = $cm->findCategoryBySlug('pizza');

        $marinara = $cm->createCategory();
        $marinara->setName('Marinara due');
        $marinara->setSlug('marinara_due');
        $marinara->setParent($parent);

        $cm->updateCategory($marinara, true);

        $allCat = $cm->findCategories();

        return $this->render('SgCategoryBundle:Default:prova.html.twig', array('allCat' => $allCat));
    }
}
