<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Tests\InkRouter\Models;

use Opensoft\InkRouterSdk\Models\PoInfo;
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
