<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

class MailingAttributesTest extends PHPUnit_Framework_TestCase
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

    protected function setUp()
    {
        $this->attributes = new InkRouter_Models_Attributes_MailingAttributes();
        $this->attributes
            ->setPoliticalMailer(true)
            ->setMailClass('firstclass')
            ->setCsvUrl('http://csv.url')
            ->setClientInvoice('')
            ->setShipExtra(1);
    }
}
