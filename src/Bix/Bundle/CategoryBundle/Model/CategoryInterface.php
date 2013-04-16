<?php
/**
 * Interface for Agnostic Class Category
 *
 * @package default
 * @author Andrea Biggi
 **/

namespace Bix\Bundle\CategoryBundle\Model;

interface CategoryInterface
{
    /**
     * @return string
     */
    public function __toString();
    
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
     * @return self
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
     * @return self
     */
    public function setSlug($slug);
    
    
} // END interface CategoryInterface