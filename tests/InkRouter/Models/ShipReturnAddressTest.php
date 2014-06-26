<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

class ShipReturnAddressTest extends PHPUnit_Framework_TestCase
{
    private $shipReturnAddress;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/ship_return_address.xml',
            $this->shipReturnAddress->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/ship_return_address.xml',
            $this->shipReturnAddress->pack());
    }

    protected function setUp()
    {
        $this->shipReturnAddress = new InkRouter_Models_ShipReturnAddress();
        $this->shipReturnAddress
            ->setCompanyName('Crymerik Industries')
            ->setPersonName('Roger Heath')
            ->setPhoneNumber('8005551234')
            ->setStreetAddress('3911 Viewpark')
            ->setCity('Irvine')
            ->setState('CA')
            ->setZip('92612')
            ->setCountry('US');
    }
}
