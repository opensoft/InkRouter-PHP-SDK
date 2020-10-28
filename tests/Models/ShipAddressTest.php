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

use InkRouter\Models\ShipAddress;
use PHPUnit\Framework\TestCase;

class ShipAddressTest extends TestCase
{

    private $shipAddress;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/xml/ship_address.xml', $this->shipAddress->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/xml/ship_address.xml', $this->shipAddress->pack());
    }

    public function testJsonSerialize()
    {
        $this->assertJsonStringEqualsJsonFile(
            dirname(__FILE__) . '/../fixtures/json/ship_address.json',
            json_encode($this->shipAddress)
        );
    }

    protected function setUp(): void
    {
        $this->shipAddress = new ShipAddress();
        $this->shipAddress->setAttention('Attention')
            ->setStreetAddress('742 Evergreen Terrace')
            ->setCity('Springfield')
            ->setState('CA')
            ->setZip('92614')
            ->setCountry('country')
            ->setCompanyName('Company Name')
            ->setPhoneNumber('1111111111')
            ->setStreet1('Evergreen Terrace')
            ->setStreet2('742');
    }
}
