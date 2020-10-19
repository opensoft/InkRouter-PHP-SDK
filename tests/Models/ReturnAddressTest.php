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
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/return_address.xml',
            $this->returnAddress->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/return_address.xml',
            $this->returnAddress->pack());
    }

    protected function setUp(): void
    {
        $this->returnAddress = new ReturnAddress();
        $this->returnAddress
            ->setStreetAddress('3911 Viewpark')
            ->setFirstName('John')
            ->setMiddleInitial('Jack')
            ->setLastName('Brown')
            ->setCity('Irvine')
            ->setState('CA')
            ->setZip('92612');
    }
}
