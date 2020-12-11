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

use InkRouter\Models\HeaderInfo;
use PHPUnit\Framework\TestCase;

class HeaderInfoTest extends TestCase
{
    private $headerInfo;

    public function testPackWithRoot()
    {
        self::assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/xml/header_info.xml', $this->headerInfo->pack(true));
    }

    public function testPackWithoutRoot()
    {
        self::assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/xml/header_info.xml', $this->headerInfo->pack());
    }

    public function testJsonSerialize()
    {
        self::assertJsonStringEqualsJsonFile(
            dirname(__FILE__) . '/../fixtures/json/header_info.json',
            json_encode($this->headerInfo)
        );
    }

    protected function setUp(): void
    {
        $this->headerInfo = new HeaderInfo();
        $this->headerInfo->setFromDomain('myprintingdomain.com')
            ->setFromIdentity('BRENT');
    }
}
