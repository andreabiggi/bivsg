<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Bix\CategoryBundle\Model;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use \Bix\CategoryBundle\Model\Category as Category;

/**
 * Storage agnostic Category Object
 *
 * @author andrea
 */
abstract class Category implements CategoryInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=45)
     */
    protected  $slug;

    /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parent")
     */
    protected  $children_category;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="children_category")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    protected  $parent_category;
    
    public function __toString()
    {
        return $this->name;
    }

    public function addChildrenCategory(Category $childrenCategory)
    {
        $this->children_category[] = $childrenCategory;
    
        return $this;
    }

    public function getChildrenCategory()
    {
        return $this->children_category;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getParentCategory()
    {
        return $this->parent_category;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function removeChildrenCategory(Category $childrenCategory)
    {
        $this->children_category->removeElement($childrenCategory);
    }

    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    public function setParentCategory(Category $parentCategory = null)
    {
        $this->parent_category = $parentCategory;
    
        return $this;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
        
        return $this;
    }

}
