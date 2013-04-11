<?php

namespace Bix\CategoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Bix\CategoryBundle\Entity\Category;
use Symfony\Component\HttpFoundation\Response;
use \Bix\CategoryBundle\Entity\RecursiveCategoryIterator;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BixCategoryBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function provaAction()
    {
        /* @var $em \Doctrine\ORM\EntityManager */
        $em = $this->getDoctrine()->getEntityManager();
        
        $rootCategories = $em->getRepository('BixCategoryBundle:Category')->findBy(array('parent_category' => NULL));
        
        $collection = new \Doctrine\Common\Collections\ArrayCollection($rootCategories);
        
        $categoryIterator = new RecursiveCategoryIterator($collection);
        
        $recursiveIterator = new \RecursiveIteratorIterator($categoryIterator, \RecursiveIteratorIterator::SELF_FIRST);
        
        //$cur = $recursiveIterator->current();
                
        return $this->render('BixCategoryBundle:Default:prova.html.twig', array('recursiveIterator' => $recursiveIterator));
    }
}
