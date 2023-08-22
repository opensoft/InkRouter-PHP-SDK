<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Tests\InkRouter\Models;

use Opensoft\InkRouterSdk\Models\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
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

    protected function setUp(): void
    {
        $this->contact = new Contact();
        $this->contact->setName('contactName')
            ->setPhone('contactPhone')
            ->setEmail('contactEmail');
    }
}
