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
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/xml/attributes/holiday_card_attributes.xml',
            $this->attributes->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/xml/attributes/holiday_card_attributes.xml',
            $this->attributes->pack());
    }

    public function testJsonSerialize()
    {
        $this->assertJsonStringEqualsJsonFile(
            dirname(__FILE__) . '/../../fixtures/json/attributes/holiday_card_attributes.json',
            json_encode($this->attributes)
        );
    }

    protected function setUp(): void
    {
        $returnAddress = new ReturnAddress();
        $returnAddress
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


        $this->attributes = new HolidayCardAttributes();
        $this->attributes
            ->setSendToSelf(true)
            ->setStuffing(true)
            ->setReturnAddress($returnAddress);
    }
}
