<?php

namespace Sg\CategoryBundle\Entity;

use Bix\Bundle\CategoryBundle\Entity\Category as BaseCategory;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="category")
 */
class Category extends BaseCategory
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parent")
     **/
    protected $childrens;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="childrens")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     **/
    protected $parent;
    

    public function __construct()
    {
        $this->childrens = new ArrayCollection();
        parent::__construct();
        // your own logic
    }

    /**
     * -------------------------------------------------------------------
     * A partire di qui mettere la logica custom: cioè quella che accoppia 
     * Category con le tabelle proprie all'applicazione.
     * -------------------------------------------------------------------
     */
    
    
}