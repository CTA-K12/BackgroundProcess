<?php

namespace MESD\BgProcess\BgProcessBundle\Tests\Entity;

use MESD\BgProcess\BgProcessBundle\Entity\StatusType;

class StatusTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct() {
        $statusType1 = new StatusType();

        $this->assertNotNull($statusType1);
        $this->assertInstanceOf('MESD\BgProcess\BgProcessBundle\Entity\StatusType', $statusType1);

        $statusType2 = new StatusType('Test', 'Super Test', true);

        $this->assertEquals('Test', $statusType2->getShortName());
        $this->assertEquals('Super Test', $statusType2->getLongName());
        $this->assertTrue($statusType2->getIsFinal());
    }
}