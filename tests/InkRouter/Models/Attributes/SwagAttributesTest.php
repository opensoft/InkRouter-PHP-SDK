<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Tests\InkRouter\Models\Attributes;

use Opensoft\InkRouterSdk\Models\Attributes\SwagAttributes;
use PHPUnit\Framework\TestCase;

class SwagAttributesTest extends TestCase
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

    protected function setUp(): void
    {
        $this->attributes = new SwagAttributes();
        $this->attributes
            ->setName('')
            ->setInventoryType('')
            ->setCost(10.2)
            ->setBox('')
            ->setShippingWeight(20.1);
    }
}
