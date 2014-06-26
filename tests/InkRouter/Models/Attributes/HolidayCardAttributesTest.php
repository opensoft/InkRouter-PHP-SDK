<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

class HolidayCardAttributesTest extends PHPUnit_Framework_TestCase
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

    protected function setUp()
    {
        $returnAddress = new InkRouter_Models_ReturnAddress();
        $returnAddress
            ->setStreetAddress('3911 Viewpark')
            ->setFirstName('John')
            ->setMiddleInitial('Jack')
            ->setLastName('Brown')
            ->setCity('Irvine')
            ->setState('CA')
            ->setZip('92612');


        $this->attributes = new InkRouter_Models_Attributes_HolidayCardAttributes();
        $this->attributes
            ->setSendToSelf(true)
            ->setStuffing(true)
            ->setReturnAddress($returnAddress);
    }
}
