<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

class BookletAttributesTest extends PHPUnit_Framework_TestCase
{
    private $attributes;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/booklet_attributes.xml', $this->attributes->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/booklet_attributes.xml', $this->attributes->pack());
    }

    protected function setUp()
    {
        $this->attributes = new InkRouter_Models_Attributes_BookletAttributes();
        $this->attributes
            ->setCover('plus')
            ->setBinding('saddle')
            ->setPages(8)
            ->setTabbing(3)
            ->setShrinkWrapping(12)
            ->setHoleMaking('R3 3/16')
            ->setCoverSubstrate('14PT');
    }
}
