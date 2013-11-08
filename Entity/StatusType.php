<?php

namespace MESD\BgProcess\BgProcessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MESD\BgProcess\BgProcessBundle\Entity\BackgroundProcess
 */
class StatusType {
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
     * @var boolean $isFinal
     */
    private $isFinal;

    //Constructor
    public function __construct($shortName = null, $longName = null, $isFinal = false) {
        if ($shortName != null) {
            $this->shortName = $shortName;
        }
        if ($longName != null) {
            $this->longName = $longName;
        }
        $this->isFinal = $isFinal;
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
     * Set isFinal
     */
    public function setIsFinal($isFinal)
    {
        $this->isFinal = $isFinal;
    
        return $this;
    }

    /**
     * Get if the status type is final
     *
     * @return boolean 
     */
    public function getIsFinal()
    {
        return $this->isFinal;
    }
}