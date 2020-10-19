<?php

/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace InkRouter\Tests\Models\Attributes;

use InkRouter\Models\Attributes\HolidayCardAttributes;
use InkRouter\Models\ReturnAddress;
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
