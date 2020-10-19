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

use InkRouter\Models\Attributes\BookletAttributes;
use PHPUnit\Framework\TestCase;

class BookletAttributesTest extends TestCase
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

    protected function setUp(): void
    {
        $this->attributes = new BookletAttributes();
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
