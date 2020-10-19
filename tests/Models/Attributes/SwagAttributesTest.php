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

use InkRouter\Models\Attributes\SwagAttributes;
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
