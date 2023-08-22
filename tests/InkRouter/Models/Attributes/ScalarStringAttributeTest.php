<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Tests\InkRouter\Models\Attributes;

use Opensoft\InkRouterSdk\Models\Attributes\ScalarStringAttribute;
use PHPUnit\Framework\TestCase;

class ScalarStringAttributeTest extends TestCase
{
    private $attribute;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/scalar_string_attribute.xml',
            $this->attribute->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/scalar_string_attribute.xml',
            $this->attribute->pack());
    }

    protected function setUp(): void
    {
        $this->attribute = new ScalarStringAttribute();
        $this->attribute
            ->setType('TSHIRT')
            ->setValue('TSHIRT');
    }
}
