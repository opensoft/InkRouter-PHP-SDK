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

use InkRouter\Models\ReturnAddress;
use PHPUnit\Framework\TestCase;

class ReturnAddressTest extends TestCase
{
    private $returnAddress;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/xml/return_address.xml',
            $this->returnAddress->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/xml/return_address.xml',
            $this->returnAddress->pack());
    }

    public function testJsonSerialize()
    {
        $this->assertJsonStringEqualsJsonFile(
            dirname(__FILE__) . '/../fixtures/json/return_address.json',
            json_encode($this->returnAddress)
        );
    }

    protected function setUp(): void
    {
        $this->returnAddress = new ReturnAddress();
        $this->returnAddress
            ->setStreetAddress('3911 Viewpark')
            ->setAttention('John Brown')
            ->setCity('Irvine')
            ->setState('CA')
            ->setZip('92612')
            ->setCountry('country')
            ->setCompanyName('Company Name')
            ->setPhoneNumber('1111111111')
            ->setStreet1('Evergreen Terrace')
            ->setStreet2('742');
    }
}
