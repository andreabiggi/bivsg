<?php

namespace Bix\Bundle\CategoryBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
// use Doctrine\Common\Collections\Collection;
//use Doctrine\Common\Collections\ArrayCollection;

/**
* Storage agnostic category object
*
* @author Andrea Biggi <andrea.biggi@gmail.com>
*/
abstract class Category implements CategoryInterface
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;

    
    protected $title;
    
    
    protected $slug;

   
    protected $lft;

  
    protected $lvl;


    protected $rgt;


    protected $root;


    protected $parent;


    protected $children;

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
    
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }
    
    public function getSlug()
    {
        return $this->slug;
    }

    public function setParent(Category $parent = null)
    {
        $this->parent = $parent;    
    }

    public function getParent()
    {
        return $this->parent;   
    }
}