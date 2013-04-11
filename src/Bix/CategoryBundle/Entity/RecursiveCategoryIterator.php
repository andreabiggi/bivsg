<?php

namespace Bix\CategoryBundle\Entity;

use Doctrine\Common\Collections\Collection;

/**
* Recursive category iterator
* @author Andrea BIggi <andrea.biggi@gmail.com>
*/
class RecursiveCategoryIterator implements \RecursiveIterator
{
	private $_data;
	
	public function __construct(Collection $data)
	{
		$this->_data = $data;
	}

	public function current()
	{
		return $this->_data->current();
	}

	public function getChildren()
	{
		return new RecursiveCategoryIterator($this->_data->current()->getChildrenCategory());
	}

	public function hasChildren()
	{
		return ( ! $this->_data->current()->getChildrenCategory()->isEmpty());
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
                                    $bool = $this->_data->current() instanceof Bix\CategoryBundle\Entity\Category;
		return $bool;
                
                   }

	public function rewind()
	{
		$this->_data->first();
	}
}
