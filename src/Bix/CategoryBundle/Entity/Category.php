<?php

namespace Bix\CategoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
//use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Bix\CategoryBundle\Model\Category as AbstractCategory;
//use \Bix\SgBundle\Entity\Trip as Trip;

/**
 * Category 
 * Questa classe sarebbe la classe di base da estendere in un "AppCategoryBundle" in una nuova applicazione.
 * In questo caso viene usata come classe per specializzare la classe AbstractCategory.
 * Qui vengono inserite le dipendenze da Trip 
 * 
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="Bix\CategoryBundle\Entity\CategoryRepository")
 */
class Category extends AbstractCategory
{
    /**
     * @ORM\ManyToMany(targetEntity="\Bix\SgBundle\Entity\Trip", mappedBy="categories")
     */
    private $trips;
    
    public function __construct()
    {
        $this->trips = new ArrayCollection();
    }
}