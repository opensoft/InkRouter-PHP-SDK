<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

class ShipTypeTest extends PHPUnit_Framework_TestCase
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

    /**
     * @expectedException InvalidArgumentException
     */
    public function testPackNotValidSignature()
    {
        $this->shipType->setSignature('wow');
    }

    public function testPackValidSignature()
    {
        $this->shipType->setSignature('required');
        $this->shipType->setSignature('required-adult');
    }

    protected function setUp()
    {
        $this->shipType = new InkRouter_Models_ShipType();
        $this->shipType->setMethod('UPS')
            ->setServiceLevel('GROUND')
            ->setCashOnDelivery(false)
            ->setSignature('required');
    }
}
