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

use InkRouter\Models\ShipReturnAddress;
use PHPUnit\Framework\TestCase;

class ShipReturnAddressTest extends TestCase
{
    private $shipReturnAddress;

    public function testPackWithRoot()
    {
        self::assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/xml/ship_return_address.xml',
            $this->shipReturnAddress->pack(true));
    }

    public function testPackWithoutRoot()
    {
        self::assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/xml/ship_return_address.xml',
            $this->shipReturnAddress->pack());
    }

    public function testJsonSerialize()
    {
        self::assertJsonStringEqualsJsonFile(
            dirname(__FILE__) . '/../fixtures/json/ship_return_address.json',
            json_encode($this->shipReturnAddress)
        );
    }

    protected function setUp(): void
    {
        $this->shipReturnAddress = new ShipReturnAddress();
        $this->shipReturnAddress
            ->setCompanyName('Crymerik Industries')
            ->setPersonName('Roger Heath')
            ->setPhoneNumber('8005551234')
            ->setStreetAddress('3911 Viewpark')
            ->setStreet1('Street 1')
            ->setStreet2('Street 2')
            ->setCity('Irvine')
            ->setState('CA')
            ->setZip('92612')
            ->setCountry('US')
            ->setAttention('Roger Heath')
            ->setSupportEmail('example@example.com');
    }
}
