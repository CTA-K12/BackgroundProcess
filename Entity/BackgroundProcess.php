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
     * @var \DateTime $started
     */
    private $started;

    /**
     * @var \DateTime $updated
     */
    private $updated;

    /**
     * @var string $status
     */
    private $status;

    /**
     * @var string $message
     */
    private $message;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct() {
        $this->status = 'Starting';
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
     * Set status
     *
     * @param string $status
     * @return BackgroundProcess
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
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
}