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
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/po_info.xml', $this->poInfo->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/po_info.xml', $this->poInfo->pack());
    }

    protected function setUp(): void
    {
        $this->poInfo = new PoInfo();
        $this->poInfo->setAgentId('agentId')
            ->setCurrency('currency');
    }
}
