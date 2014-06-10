<?php

namespace Mesd\BgProcessBundle\Tests\Entity;

use Mesd\BgProcessBundle\Entity\StatusType;

class StatusTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruct() {
        $statusType1 = new StatusType();

        $this->assertNotNull($statusType1);
        $this->assertInstanceOf('Mesd\BgProcessBundle\Entity\StatusType', $statusType1);

        $statusType2 = new StatusType('Test', 'Super Test', true);

        $this->assertEquals('Test', $statusType2->getShortName());
        $this->assertEquals('Super Test', $statusType2->getLongName());
        $this->assertTrue($statusType2->getIsFinal());
    }
}