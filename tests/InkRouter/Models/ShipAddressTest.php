<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Tests\InkRouter\Models;

use Opensoft\InkRouterSdk\Models\ShipAddress;
use PHPUnit\Framework\TestCase;

class ShipAddressTest extends TestCase
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

    protected function setUp(): void
    {
        $this->shipAddress = new ShipAddress();
        $this->shipAddress->setAttention('Attention')
            ->setStreetAddress('742 Evergreen Terrace')
            ->setCity('Springfield')
            ->setState('CA')
            ->setZip('92614')
            ->setCountry('country')
            ->setCompanyName('Company Name');
    }
}
