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
        self::assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/xml/attributes/swag_attributes.xml',
            $this->attributes->pack(true));
    }

    public function testPackWithoutRoot()
    {
        self::assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/xml/attributes/swag_attributes.xml',
            $this->attributes->pack());
    }

    public function testJsonSerialize()
    {
        self::assertJsonStringEqualsJsonFile(
            dirname(__FILE__) . '/../../fixtures/json/attributes/swag_attributes.json',
            json_encode($this->attributes)
        );
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
