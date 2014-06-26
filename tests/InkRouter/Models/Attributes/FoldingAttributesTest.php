<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

class FoldingAttributesTest extends PHPUnit_Framework_TestCase
{
    private $attributes;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/folding_attributes.xml', $this->attributes->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/folding_attributes.xml', $this->attributes->pack());
    }

    protected function setUp()
    {
        $this->attributes = new InkRouter_Models_Attributes_FoldingAttributes();
        $this->attributes
            ->setFoldingType('F-4')
            ->setFlipTopPanel(true)
            ->setInsideOut(true);
    }
}
