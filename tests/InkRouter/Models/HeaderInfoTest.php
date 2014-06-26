<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

class HeaderInfoTest extends PHPUnit_Framework_TestCase
{

    private $headerInfo;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/header_info.xml', $this->headerInfo->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/header_info.xml', $this->headerInfo->pack());
    }

    protected function setUp()
    {
        $this->headerInfo = new InkRouter_Models_HeaderInfo();
        $this->headerInfo->setFromDomain('myprintingdomain.com')
            ->setFromIdentity('BRENT');
    }
}
