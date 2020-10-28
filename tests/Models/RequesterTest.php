<?php

/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace InkRouter\Tests\Models;

use InkRouter\Models\Requester;
use PHPUnit\Framework\TestCase;

class RequesterTest extends TestCase
{

    private $requester;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/xml/requester.xml',
            $this->requester->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/xml/requester.xml',
            $this->requester->pack());
    }

    public function testJsonSerialize()
    {
        $this->assertJsonStringEqualsJsonFile(
            dirname(__FILE__) . '/../fixtures/json/requester.json',
            json_encode($this->requester)
        );
    }

    protected function setUp(): void
    {
        $this->requester = new Requester();
        $this->requester->setName('Jaisor Prints')
            ->setContract('STANDARD')
            ->setPayTerm('FREE');
    }
}
