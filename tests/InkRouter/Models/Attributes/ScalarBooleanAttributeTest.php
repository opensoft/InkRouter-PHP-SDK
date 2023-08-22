<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Tests\InkRouter\Models\Attributes;

use Opensoft\InkRouterSdk\Models\Attributes\ScalarBooleanAttribute;
use PHPUnit\Framework\TestCase;

class ScalarBooleanAttributeTest extends TestCase
{
    private $attribute;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/scalar_boolean_attribute.xml',
            $this->attribute->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/scalar_boolean_attribute.xml',
            $this->attribute->pack());
    }

    protected function setUp(): void
    {
        $this->attribute = new ScalarBooleanAttribute();
        $this->attribute
            ->setType('ROUNDING')
            ->setValue(true);
    }
}
