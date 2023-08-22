<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Tests\InkRouter\Models\Attributes;

use Opensoft\InkRouterSdk\Models\Attributes\FoldingAttributes;
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
