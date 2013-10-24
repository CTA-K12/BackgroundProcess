<?php

namespace MESD\BgProcess\BgProcessBundle\Tests\Entity;

use MESD\BgProcess\BgProcessBundle\Entity\BackgroundProcess;

class BackgroundProcessTest extends \PHPUnit_Framework_TestCase
{
    /**
     *  Test the constructor to make sure the defaults are set correctly
     */
    public function testConstruct() {
        $bgProcess = new BackgroundProcess();

        $this->assertNotNull($bgProcess);
        $this->assertEquals('Starting', $bgProcess->getStatus());
        $this->assertNotNull($bgProcess->getStartDate());
        $this->assertEquals(0, $bgProcess->getProcessed());
        $this->assertEquals(1, $bgProcess->getToProcess());
        $this->assertEquals(0, $bgProcess->getSuccessCount());
    }

    /** 
     *  Test the setToProcess method to ensure it follows its constraints
     */
    public function testSetToProcess() {
        $bgProcess = new BackgroundProcess();

        $this->assertEquals(1, $bgProcess->getToProcess());

        $bgProcess->setToProcess(25);
        $this->assertEquals(25, $bgProcess->getToProcess());

        $bgProcess->setToProcess(0);
        $this->assertEquals(25, $bgProcess->getToProcess());

        $bgProcess->setToProcess(-5);
        $this->assertEquals(25, $bgProcess->getToProcess());

        $bgProcess->setToProcess(3.141592);
        $this->assertEquals(25, $bgProcess->getToProcess());

        $bgProcess->setToProcess('Apple Pie');
        $this->assertEquals(25, $bgProcess->getToProcess());
    }

    /**
     *  Test the setProcessed method to ensure it follows its constraints
     */
    public function testSetProcessed() {
        $bgProcess = new BackgroundProcess();

        $this->assertEquals(0, $bgProcess->getProcessed());

        $bgProcess->setProcessed(25);
        $this->assertEquals(25, $bgProcess->getProcessed());
        $this->assertEquals(25, $bgProcess->getToProcess());

        $bgProcess->setProcessed(-1);
        $this->assertEquals(25, $bgProcess->getProcessed());

        $bgProcess->setProcessed(3.141592);
        $this->assertEquals(25, $bgProcess->getProcessed());

        $bgProcess->setProcessed('Cherry Pie');
        $this->assertEquals(25, $bgProcess->getProcessed);
    }

    /**
     *  Test the setSuccessCount to ensure that its constraints are followed
     */
    public function testSetSuccessCount() {
        $bgProcess = new BackgroundProcess();

        $this->assertEquals(0, $bgProcess->getSuccessCount());

        $bgProcess->setToProcess(25);
        $bgProcess->setProcessed(10);
        $bgProcess->setSuccessCount(8);
        $this->assertEquals(8, $bgProcess->getSuccessCount());

        $bgProcess->setSuccessCount(-7);
        $this->assertEquals(8, $bgProcess->getSuccessCount());

        $bgProcess->setSuccessCount(3.141592);
        $this->assertEquals(8, $bgProcess->getSuccessCount());

        $bgProcess->setSucessCount('Pumpkin Pie');
        $this->assertEquals(8, $bgProcess->getSuccessCount());

        $bgProcess->setSuccessCount(15);
        $this->assertEquals(15, $bgProcess->getSuccessCount());
        $this->assertEquals(15, $bgProcess->getProcessed());

        $bgProcess->setSuccessCount(30);
        $this->assertEquals(30, $bgProcess->getSuccessCount());
        $this->assertEquals(30, $bgProcess->getProcessed());
        $this->assertEquals(30, $bgProcess->getToProcess());
    }

    /**
     *  Test the increment function
     */
    public function testIncrement() {
        $bgProcess = new BackgroundProcess();

        $bgProcess->setToProcess(2);
        $bgProcess->increment();
        $this->assertEquals(1, $this->getProcessed());
        $this->assertEquals(2, $this->getToProcess());
        $this->assertEquals(0, $this->getSuccessCount());

        $bgProcess->increment();
        $bgProcess->increment();
        $this->assertEquals(3, $this->getProcessed());
        $this->assertEquals(3, $this->getToProcess());
        $this->assertEquals(0, $this->getSuccessCount());
    }

    /**
     *  Test the increment success function
     */
    public function testIncrementSuccess() {
        $bgProcess = new BackgroundProcess();

        $bgProcess->setToProcess(2);
        $bgProcess->incrementSuccess();
        $this->assertEquals(1, $this->getProcessed());
        $this->assertEquals(2, $this->getToProcess());
        $this->assertEquals(1, $this->getSuccessCount());

        $bgProcess->incrementSuccess();
        $bgProcess->incrementSuccess();
        $this->assertEquals(3, $this->getProcessed());
        $this->assertEquals(3, $this->getToProcess());
        $this->assertEquals(3, $this->getSuccessCount());
    }

    /**
     *  Test the increment failure function
     */
    public function testIncrementFailure() {
        $bgProcess = new BackgroundProcess();

        $bgProcess->setToProcess(2);
        $bgProcess->incrementFailure();
        $this->assertEquals(1, $this->getProcessed());
        $this->assertEquals(2, $this->getToProcess());
        $this->assertEquals(0, $this->getSuccessCount());

        $bgProcess->incrementFailure();
        $bgProcess->incrementFailure();
        $this->assertEquals(3, $this->getProcessed());
        $this->assertEquals(3, $this->getToProcess());
        $this->assertEquals(0, $this->getSuccessCount());
    }
}