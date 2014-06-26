<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

class RequesterTest extends PHPUnit_Framework_TestCase
{

    private $requester;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/requester.xml',
            $this->requester->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/requester.xml',
            $this->requester->pack());
    }

    protected function setUp()
    {
        $this->requester = new InkRouter_Models_Requester();
        $this->requester->setName('Jaisor Prints')
            ->setContract('STANDARD')
            ->setPayTerm('FREE');
    }
}
