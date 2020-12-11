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

use InkRouter\Models\ShipType;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

class ShipTypeTest extends TestCase
{

    private $shipType;

    public function testPackWithRoot()
    {
        self::assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/xml/ship_type.xml', $this->shipType->pack(true));
    }

    public function testPackWithoutRoot()
    {
        self::assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/xml/ship_type.xml', $this->shipType->pack());
    }

    public function testPackNotValidSignature()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->shipType->setSignature('wow');
    }

    public function testPackValidSignature()
    {
        $this->shipType->setSignature('required');
        self::assertSame('required', $this->shipType->getSignature());
        $this->shipType->setSignature('required-adult');
        self::assertSame('required-adult', $this->shipType->getSignature());
    }

    public function testJsonSerialize()
    {
        self::assertJsonStringEqualsJsonFile(dirname(__FILE__) . '/../fixtures/json/ship_type.json', json_encode($this->shipType));
    }

    protected function setUp(): void
    {
        $this->shipType = new ShipType();
        $this->shipType->setMethod('UPS')
            ->setServiceLevel('GROUND')
            ->setSignature('required');
    }
}
