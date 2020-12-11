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

use InkRouter\Models\Attributes\FoldingAttributes;
use PHPUnit\Framework\TestCase;

class FoldingAttributesTest extends TestCase
{
    private $attributes;

    public function testPackWithRoot()
    {
        self::assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/xml/attributes/folding_attributes.xml', $this->attributes->pack(true));
    }

    public function testPackWithoutRoot()
    {
        self::assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/xml/attributes/folding_attributes.xml', $this->attributes->pack());
    }

    public function testJsonSerialize()
    {
        self::assertJsonStringEqualsJsonFile(
            dirname(__FILE__) . '/../../fixtures/json/attributes/folding_attributes.json',
            json_encode($this->attributes)
        );
    }

    protected function setUp(): void
    {
        $this->attributes = new FoldingAttributes();
        $this->attributes
            ->setFoldingType('F-4')
            ->setFlipTopPanel(true)
            ->setInsideOut(true);
    }
}
