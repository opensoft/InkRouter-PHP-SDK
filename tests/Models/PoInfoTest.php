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

use InkRouter\Models\PoInfo;
use PHPUnit\Framework\TestCase;

class PoInfoTest extends TestCase
{
    private $poInfo;

    public function testPackWithRoot()
    {
        self::assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/xml/po_info.xml', $this->poInfo->pack(true));
    }

    public function testPackWithoutRoot()
    {
        self::assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/xml/po_info.xml', $this->poInfo->pack());
    }

    public function testJsonSerialize()
    {
        self::assertJsonStringEqualsJsonFile(
            dirname(__FILE__) . '/../fixtures/json/po_info.json',
            json_encode($this->poInfo)
        );
    }

    protected function setUp(): void
    {
        $this->poInfo = new PoInfo();
        $this->poInfo->setAgentId('agentId')
            ->setCurrency('currency');
    }
}
