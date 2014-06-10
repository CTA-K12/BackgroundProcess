<?php

namespace Mesd\BgProcessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mesd\BgProcessBundle\Entity\BackgroundProcess
 */
class ProcessType {
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $shortName
     */
    private $shortName;

    /**
     * @var string $longName
     */
    private $longName;

    /**
     * @var string $description
     */
    private $description;

    //Constructor
    public function __construct($shortName = null, $longName = null, $description = null) {
        if ($shortName) {
            $this->shortName = $shortName;
        }
        if ($longName) {
            $this->longName = $longName;
        }
        if ($description) {
            $this->description = $description;
        }
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
     * @ORM\PrePersist
     */
    public function setUpdatedValue()
    {
        // Add your code here
    }

    /**
     * Default __toString.  Customize to suit
     */
    public function __toString()
    {
        return (string)$this->getId();
    }

    /**
     * Set shortName
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;

        return $this;
    }

    /**
     * Get shortName
     *
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * Set longName
     */
    public function setLongName($longName)
    {
        $this->longName = $longName;

        return $this;
    }

    /**
     * Get longName
     *
     * @return string
     */
    public function getLongName()
    {
        return $this->longName;
    }

    /**
     * Set description
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}