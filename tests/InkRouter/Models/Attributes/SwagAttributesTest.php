<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

class SwagAttributesTest extends PHPUnit_Framework_TestCase
{
    private $attributes;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/swag_attributes.xml',
            $this->attributes->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/swag_attributes.xml',
            $this->attributes->pack());
    }

    protected function setUp()
    {
        $this->attributes = new InkRouter_Models_Attributes_SwagAttributes();
        $this->attributes
            ->setName('')
            ->setInventoryType('')
            ->setCost(10.2)
            ->setBox('')
            ->setShippingWeight(20.1);
    }
}
