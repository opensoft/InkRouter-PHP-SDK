<?php

/**
 * @author James Taylor <james.taylor@opensoftdev.com>
 */
class NotepadsAttributesTest extends PHPUnit_Framework_TestCase
{
    private $attributes;

    protected function setUp()
    {
        $this->attributes = new InkRouter_Models_Attributes_NotepadsAttributes();
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
