<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

class ScalarStringAttributeTest extends PHPUnit_Framework_TestCase
{
    private $attribute;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/scalar_string_attribute.xml',
            $this->attribute->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/scalar_string_attribute.xml',
            $this->attribute->pack());
    }

    protected function setUp()
    {
        $this->attribute = new InkRouter_Models_Attributes_ScalarStringAttribute();
        $this->attribute
            ->setType('TSHIRT')
            ->setValue('TSHIRT');
    }
}
