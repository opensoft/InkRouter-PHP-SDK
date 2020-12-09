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

use InkRouter\Models\Attributes\NotepadsAttributes;
use PHPUnit\Framework\TestCase;

/**
 * @author James Taylor <james.taylor@opensoftdev.com>
 */
class NotepadsAttributesTest extends TestCase
{
    private $attributes;

    protected function setUp(): void
    {
        $this->attributes = new NotepadsAttributes();
        $this->attributes->setPages(50);
    }

    public function testPackWithRoot()
    {
        self::assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/xml/attributes/notepads_attributes.xml', $this->attributes->pack(true));
    }

    public function testPackWithoutRoot()
    {
        self::assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/xml/attributes/notepads_attributes.xml', $this->attributes->pack());
    }

    public function testJsonSerialize()
    {
        self::assertJsonStringEqualsJsonFile(
            dirname(__FILE__) . '/../../fixtures/json/attributes/notepads_attributes.json',
            json_encode($this->attributes)
        );
    }
}
