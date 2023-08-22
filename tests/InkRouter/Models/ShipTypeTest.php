<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Tests\InkRouter\Models;

use \InvalidArgumentException;
use Opensoft\InkRouterSdk\Models\ShipType;
use PHPUnit\Framework\TestCase;

class ShipTypeTest extends TestCase
{

    private $shipType;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/ship_type.xml', $this->shipType->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/ship_type.xml', $this->shipType->pack());
    }

    public function testPackNotValidSignature()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->shipType->setSignature('wow');
    }

    public function testPackValidSignature()
    {
        $this->shipType->setSignature('required');
        $this->assertEquals('required', $this->shipType->getSignature());
        $this->shipType->setSignature('required-adult');
        $this->assertEquals('required-adult', $this->shipType->getSignature());
    }

    protected function setUp(): void
    {
        $this->shipType = new ShipType();
        $this->shipType->setMethod('UPS')
            ->setServiceLevel('GROUND')
            ->setSignature('required');
    }
}
