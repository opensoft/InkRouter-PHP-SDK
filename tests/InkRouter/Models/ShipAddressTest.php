<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

class ShipAddressTest extends PHPUnit_Framework_TestCase
{

    private $shipAddress;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/ship_address.xml', $this->shipAddress->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/ship_address.xml', $this->shipAddress->pack());
    }

    protected function setUp()
    {
        $this->shipAddress = new InkRouter_Models_ShipAddress();
        $this->shipAddress->setAttention('Attention')
            ->setStreetAddress('742 Evergreen Terrace')
            ->setCity('Springfield')
            ->setState('CA')
            ->setZip('92614')
            ->setCountry('country')
            ->setCompanyName('Company Name');
    }
}
