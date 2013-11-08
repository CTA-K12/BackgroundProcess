<?php

namespace MESD\BgProcess\BgProcessBundle\Tests\Entity;

use MESD\BgProcess\BgProcessBundle\Entity\ProcessType;

class ProcessTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct() {
        $processType1 = new ProcessType();

        $this->assertNotNull($processType1);
        $this->assertInstanceOf('MESD\BgProcess\BgProcessBundle\Entity\ProcessType', $processType1);

        $processType2 = new ProcessType('Test', 'Super Test', 'Test Description');

        $this->assertEquals('Test', $processType2->getShortName());
        $this->assertEquals('Super Test', $processType2->getLongName());
        $this->assertEquals('Test Description', $processType2->getDescription());
    }
}