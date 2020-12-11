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

use InkRouter\Models\Attributes\ScalarStringAttribute;
use PHPUnit\Framework\TestCase;

class ScalarStringAttributeTest extends TestCase
{
    private $attribute;

    public function testPackWithRoot()
    {
        self::assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/xml/attributes/scalar_string_attribute.xml',
            $this->attribute->pack(true));
    }

    public function testPackWithoutRoot()
    {
        self::assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/xml/attributes/scalar_string_attribute.xml',
            $this->attribute->pack());
    }

    public function testJsonSerialize()
    {
        self::assertJsonStringEqualsJsonFile(
            dirname(__FILE__) . '/../../fixtures/json/attributes/scalar_string_attribute.json',
            json_encode($this->attribute)
        );
    }

    protected function setUp(): void
    {
        $this->attribute = new ScalarStringAttribute();
        $this->attribute
            ->setType('TSHIRT')
            ->setValue('TSHIRT');
    }
}
