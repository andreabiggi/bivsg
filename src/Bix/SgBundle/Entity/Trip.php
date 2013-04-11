<?php

namespace Bix\SgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Trip
 *
 * @ORM\Table(name="trip")
 * @ORM\Entity(repositoryClass="Bix\SgBundle\Entity\TripRepository")
 */
class Trip
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="intro", type="text")
     */
    private $intro;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;

    /**
     * @var string
     *
     * @ORM\Column(name="video", type="string", length=255)
     */
    private $video;
    
    /**
     * @ORM\ManyToMany(targetEntity="\Bix\CategoryBundle\Entity\Category", inversedBy="trips")
     * @ORM\JoinTable(name="trips_categories")
     */
    private $categories;
    
    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

        /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Trip
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set intro
     *
     * @param string $intro
     * @return Trip
     */
    public function setIntro($intro)
    {
        $this->intro = $intro;
    
        return $this;
    }

    /**
     * Get intro
     *
     * @return string 
     */
    public function getIntro()
    {
        return $this->intro;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return Trip
     */
    public function setBody($body)
    {
        $this->body = $body;
    
        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set video
     *
     * @param string $video
     * @return Trip
     */
    public function setVideo($video)
    {
        $this->video = $video;
    
        return $this;
    }

    /**
     * Get video
     *
     * @return string 
     */
    public function getVideo()
    {
        return $this->video;
    }
    
}
