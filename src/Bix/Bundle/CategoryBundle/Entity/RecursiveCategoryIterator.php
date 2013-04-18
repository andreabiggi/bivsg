<?php

namespace Bix\Bundle\CategoryBundle\Entity;

use Doctrine\Common\Collections\Collection;

/**
 * Recursive category iterator
 */
 class RecursiveCategoryIterator implements \RecursiveIterator
 {
     
     private $_data;
             
     function __construct(Collection $data)
     {
         $this->_data = $data;
     }
     
     public function hasChildren()
     {
         return ( ! $this->_data->current()->getChildrens()->isEmpty() );
     }
     
     public function getChildren()
     {
         return new RecursiveCategoryIterator($this->_data->current()->getChildrens());
     }
     
     public function current()
     {
         return $this->_data->current();
     }

     public function next()
     {
         $this->_data->next();
     }

     public function key()
     {
         return $this->_data->key();
     }
     
     public function valid()
     {
          return $this->_data->current() instanceof Bix\Bundle\CategoryBundle\Model\Category;
     }
     
     public function rewind()
     {
         $this->_data->first();
     }
     
 } 