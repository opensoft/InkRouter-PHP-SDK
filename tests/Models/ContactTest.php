<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace InkRouter\Tests\Models;

use InkRouter\Models\Contact;
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
