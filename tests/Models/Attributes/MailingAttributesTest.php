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

use InkRouter\Models\Attributes\MailingAttributes;
use PHPUnit\Framework\TestCase;

class MailingAttributesTest extends TestCase
{
    private $attributes;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/mailing_attributes.xml',
            $this->attributes->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../../fixtures/mailing_attributes.xml',
            $this->attributes->pack());
    }

    protected function setUp(): void
    {
        $this->attributes = new MailingAttributes();
        $this->attributes
            ->setPoliticalMailer(true)
            ->setMailClass('firstclass')
            ->setCsvUrl('http://csv.url')
            ->setClientInvoice('')
            ->setShipExtra(1)
            ->setMailingFont('Arial');
    }
}
