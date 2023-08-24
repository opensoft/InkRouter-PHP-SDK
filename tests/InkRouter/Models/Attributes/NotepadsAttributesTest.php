<?php

/**
 * @author James Taylor <james.taylor@opensoftdev.com>
 */

namespace Tests\InkRouter\Models\Attributes;

use Opensoft\InkRouterSdk\Models\Attributes\NotepadsAttributes;
use PHPUnit\Framework\TestCase;

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
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/notepads_attributes.xml', $this->attributes->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/notepads_attributes.xml', $this->attributes->pack());
    }
}
