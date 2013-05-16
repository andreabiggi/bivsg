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
        /* @var $cm \Bix\Bundle\CategoryBundle\Doctrine\CategoryManager */
        $cm = $this->get('bix_category.category_manager');
        $pizza = $cm->findCategoryBySlug('pizza');
        $margherita = $cm->findCategoryBySlug('margherita');
        $bianca = $cm->findCategoryBySlug('bianca');
        
        $childs = $cm->getChildrensOf($pizza, FALSE, 'title');
        
        $path = $cm->getPath($bianca);
        
        return $this->render('SgCategoryBundle:Default:prova.html.twig', 
                array(
                    'childs' => $childs,
                    'path' => $path
                ));
    }
}
