<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

class ContactTest extends PHPUnit_Framework_TestCase
{

    private $contact;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/contact.xml', $this->contact->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/contact.xml', $this->contact->pack());
    }

    protected function setUp()
    {
        $this->contact = new InkRouter_Models_Contact();
        $this->contact->setName('contactName')
            ->setPhone('contactPhone')
            ->setEmail('contactEmail');
    }
}
