<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Tests\InkRouter\Models\Attributes;

use Opensoft\InkRouterSdk\Models\Attributes\HolidayCardAttributes;
use Opensoft\InkRouterSdk\Models\ReturnAddress;
use PHPUnit\Framework\TestCase;

class HolidayCardAttributesTest extends TestCase
{
    private $attributes;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/holiday_card_attributes.xml',
            $this->attributes->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/holiday_card_attributes.xml',
            $this->attributes->pack());
    }

    protected function setUp(): void
    {
        $returnAddress = new ReturnAddress();
        $returnAddress
            ->setStreetAddress('3911 Viewpark')
            ->setFirstName('John')
            ->setMiddleInitial('Jack')
            ->setLastName('Brown')
            ->setCity('Irvine')
            ->setState('CA')
            ->setZip('92612');


        $this->attributes = new HolidayCardAttributes();
        $this->attributes
            ->setSendToSelf(true)
            ->setStuffing(true)
            ->setReturnAddress($returnAddress);
    }
}
