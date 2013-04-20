<?php

namespace Sg\CategoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sg\CategoryBundle\Entity\Category;
use Doctrine\Common\Collections\Collection;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SgCategoryBundle:Default:index.html.twig', array('name' => $name));
    }

    public function provaAction()
    {


        $cm = $this->get('bix_category.category_manager');

        $parent = $cm->findCategoryBySlug('margherita');

        $bianca = $cm->createCategory();
        $bianca->setName('bianca');
        $bianca->setSlug('bianca');
        $bianca->setParent($parent);
        $cm->updateCategory($bianca);

        $rossa = $cm->createCategory();
        $rossa->setName('rossa');
        $rossa->setSlug('rossa');
        $rossa->setParent($parent);

        $cm->updateCategory($rossa, true);

        $allCat = $cm->findCategories();

        $pizza = $cm->findCategoryBySlug('pizza');
        $pizzaChildrens = $cm->getChildrensOf($pizza);

        $pizza = $cm->findCategoryBySlug('pizza');

        $pizzaRecursiveChildrens = $cm->getChildrensRecursiveOf($pizza);

        return $this->render('SgCategoryBundle:Default:prova.html.twig', array(
                'allCat' => $allCat,
                'pizzaChildrens' => $pizzaChildrens,
                'pizzaRecursiveChildrens' => $pizzaRecursiveChildrens,
            ));
    }
}
