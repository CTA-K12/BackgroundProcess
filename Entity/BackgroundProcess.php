<?php

namespace MESD\BgProcess\BgProcessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MESD\BgProcess\BgProcessBundle\Entity\BackgroundProcess
 */
class BackgroundProcess
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $processId
     */
    private $processId;

    /**
     * @var \DateTime $started
     */
    private $started;

    /**
     * @var \DateTime $updated
     */
    private $updated;

    /**
     * @var boolean $statusType
     */
    private $statusType;

    /**
     * @var string $message
     */
    private $message;

    /**
     * @var string $processParameters
     */
    private $processParameters;

    /**
     * @var integer $toProcess
     */
    private $toProcess;

    /**
     * @var integer $processed
     */
    private $processed;

    /**
     * @var integer $successCount
     */
    private $successCount;

    /**
     * @var MESD\BgProcess\BgProcessBundle\ProcessType
     */
    private $processType;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct() {
        $this->started = new \DateTime();
        $this->toProcess = 1;
        $this->processed = 0;
        $this->successCount = 0;
    }

    /**
     * Default __toString.  Customize to suit
     */
    public function __toString()
    {
        return (string)$this->getId();
    }
    

    /**
     * Set started
     *
     * @param \DateTime $started
     * @return BackgroundProcess
     */
    public function setStarted($started)
    {
        $this->started = $started;
    
        return $this;
    }

    /**
     * Get started
     *
     * @return \DateTime 
     */
    public function getStarted()
    {
        return $this->started;
    }



    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return BackgroundProcess
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    
        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }



    /**
     * Set statusType
     *
     * @param MESD/BgProcess/BgProcessBundle/StatusType $statusType
     * @return BackgroundProcess
     */
    public function setStatusType($statusType)
    {
        $this->statusType = $statusType;
    
        return $this;
    }

    /**
     * Get statusType
     *
     * @return MESD/BgProcess/BgProcessBundle/StatusType
     */
    public function getStatusType()
    {
        return $this->statusType;
    }

    /**
     * Set processType
     */
    public function setProcessType($processType)
    {
        $this->processType = $processType;
    
        return $this;
    }

    /**
     * Get processType 
     */
    public function getProcessType()
    {
        return $this->processType;
    }



    /**
     * Set message
     *
     * @param string $message
     * @return BackgroundProcess
     */
    public function setMessage($message)
    {
        $this->message = $message;
    
        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }


    /**
     * Set processParameters
     *
     * @param string $processParameters
     * @return BackgroundProcess
     */
    public function setProcessParameters($processParameters)
    {
        $this->processParameters = $processParameters;
    
        return $this;
    }

    /**
     * Get processParameters
     *
     * @return string 
     */
    public function getProcessParameters()
    {
        return $this->processParameters;
    }



    /**
     * Set toProcess
     *
     * @param integer $toProcess
     * @return BackgroundProcess
     */
    public function setToProcess($toProcess)
    {
        if (gettype($toProcess) == 'integer' && $toProcess > 0) {
            if ($toProcess < $this->processed) {
                $toProcess = $this->processed;
            }
            $this->toProcess = $toProcess;
        }

        return $this;
    }

    /**
     * Get toProcess
     *
     * @return integer 
     */
    public function getToProcess()
    {
        return $this->toProcess;
    }



    /**
     * Set processed
     *
     * @param integer $processed
     * @return BackgroundProcess
     */
    public function setProcessed($processed)
    {
        if (gettype($processed) == 'integer' && $processed >= 0) {
            if ($processed > $this->toProcess) {
                $this->toProcess = $processed;
            }
            $this->processed = $processed;
        }
    
        return $this;
    }

    /**
     * Get processed
     *
     * @return integer 
     */
    public function getProcessed()
    {
        return $this->processed;
    }



    /**
     * Set successCount
     *
     * @param integer $successCount
     * @return BackgroundProcess
     */
    public function setSuccessCount($successCount)
    {
        if (gettype($successCount) == 'integer' && $successCount >= 0) {
            if ($successCount > $this->getProcessed()) {
                $this->setProcessed($successCount);
            }
            $this->successCount = $successCount;
        }
    
        return $this;
    }

    /**
     * Get successCount
     *
     * @return integer 
     */
    public function getSuccessCount()
    {
        return $this->successCount;
    }



    /**
     * Set processId
     *
     * @param integer $processId
     * @return BackgroundProcess
     */
    public function setProcessId($processId)
    {
        $this->processId = $processId;
    
        return $this;
    }

    /**
     * Get processId
     *
     * @return integer 
     */
    public function getProcessId()
    {
        return $this->processId;
    }


    /**
     * @ORM\PrePersist
     */
    public function setUpdatedValue()
    {
        // Add your code here
    }

    /**
     *  Increment processed count
     */
    public function increment() 
    {
        $this->setProcessed($this->getProcessed() + 1);
    }

    /**
     *  Increment processed and success count
     */
    public function incrementSuccess() 
    {
        $this->increment();
        $this->setSuccessCount($this->getSuccessCount() + 1);
    }

    /**
     *  Increment failure (currently just another class to increment, but may be more in the future)
     */
    public function incrementFailure() 
    {
        $this->increment();
    }

    /**
     *  Return the process parameters as an array (for easier twig rendering)
     *  @return array
     */
    public function getProcessParametersAsArray() {
        return json_decode($this->processParameters, true);
    }
}