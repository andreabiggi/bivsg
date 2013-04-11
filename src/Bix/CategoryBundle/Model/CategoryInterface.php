<?php
/**
 * Category interface
 */
namespace Bix\CategoryBundle\Model;


/**
 *
 * @author andrea
 */
interface CategoryInterface 
{
    /**
     * @return string
     */
    public function __toString();
    
    /**
     * Get the id category.
     * 
     * @return integer 
     */
    public function getId();
    
    /**
     * Get the category Name
     * 
     * @return string
     */
    public function getName();
    
    /**
     * Set category name
     * 
     * @param string $name
     * @return Category
     */
    public function setName($name);
    
    /**
     * Get the category slug
     * 
     * @return string
     */
    public function getSlug();
    
    /**
     * Set category slug
     * 
     * @param string $slug
     * @return Category
     */
    public function setSlug($slug);
    
    /**
     * Add children category
     * 
     * @param \Bix\CategoryBundle\Model\Category $childrenCategory
     * @return Category 
     */
    public function addChildrenCategory(\Bix\CategoryBundle\Model\Category $childrenCategory);
    
    /**
     * 
     * @param \Bix\CategoryBundle\Model\Category $childrenCategory
     */
    public function removeChildrenCategory(\Bix\CategoryBundle\Model\Category $childrenCategory);
    
    /**
     * Get the children category
     * 
     * ^@return \Doctrine\Common\Collections\Collection 
     */
    public function getChildrenCategory();
    
    public function setParentCategory( \Bix\CategoryBundle\Model\Category $parentCategory = null);
    
    public function getParentCategory();
}
