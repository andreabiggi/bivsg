<?php

namespace Acme\ProvaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\ProvaBundle\Entity\Category as Category;

class CategoryController extends Controller
{  
    public function  indexAction()
    {
        $em = $this->get('doctrine.orm.entity_manager');
        
        $repo = $em->getRepository('Acme\ProvaBundle\Entity\Category');
        
        $options = array(
            'decorate' => true,
            'rootOpen' => '<ul>',
            'rootClose' => '</ul>',
            'childOpen' => '<li>',
            'childClose' => '</li>',
            'nodeDecorator' => function($node) {
                return '<a href="page">' . $node['title'] . '</a>';
            }
        );
        $htmlTree = $repo->childrenHierarchy(
            null, /* starting from root nodes */
            false, /* true: load all children, false: only direct */
            $options
        );

        return $this->render('AcmeProvaBundle:Category:index.html.twig', array('htmlTree' => $htmlTree));
    }
}
