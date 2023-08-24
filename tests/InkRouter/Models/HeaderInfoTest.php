<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Tests\InkRouter\Models;

use Opensoft\InkRouterSdk\Models\HeaderInfo;
use PHPUnit\Framework\TestCase;

class HeaderInfoTest extends TestCase
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

    protected function setUp(): void
    {
        $this->headerInfo = new HeaderInfo();
        $this->headerInfo->setFromDomain('myprintingdomain.com')
            ->setFromIdentity('BRENT');
    }
}
