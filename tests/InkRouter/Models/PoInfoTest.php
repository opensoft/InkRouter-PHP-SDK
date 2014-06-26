<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

class PoInfoTest extends PHPUnit_Framework_TestCase
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

    protected function setUp()
    {
        $this->poInfo = new InkRouter_Models_PoInfo();
        $this->poInfo->setAgentId('agentId')
            ->setCurrency('currency');
    }
}
