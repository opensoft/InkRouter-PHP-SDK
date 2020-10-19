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
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/folding_attributes.xml', $this->attributes->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/folding_attributes.xml', $this->attributes->pack());
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
