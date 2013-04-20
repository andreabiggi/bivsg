<?php

namespace Bix\Bundle\CategoryBundle\Model;

// use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
* Storage agnostic category object
*
* @author Andrea Biggi <andrea.biggi@gmail.com>
*/
abstract class Category implements CategoryInterface
{
    protected $id;

    /**
     * Category Name
     * @var string
     */
    protected $name;

    /**
     * Category Slug
     * @var string
     */
    protected $slug;

    /**
     * Parent Category
     * @var self
     */
    protected $parent;

    /**
     * Children Category
     * @var ArrayCollection
     */
    protected $childrens;
    
    /**
     * Initialize children categories as ArrayCollections
     */
    function __construct()
    {
        $this->childrens = new ArrayCollection;
    }

    /**
     * Returns the user unique id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Category
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * Get childrens collections
     * 
     * @return ArrayCollection 
     */
    public function getChildrens()
    {
        return $this->childrens ?: $this->childrens = new ArrayCollection;
    }

    /**
     * Get an array of children names
     * @return mixt
     */
    public function getChildrenNames()
    {
        $names = array();
        foreach ($this->getChildrens() as $children) {
            $names[] = $children->getName();
        }

        return $names;
    }

    /**
     * Set the category's parent
     * 
     * @param Category $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }


}