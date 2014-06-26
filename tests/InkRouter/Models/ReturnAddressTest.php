<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

class ReturnAddressTest extends PHPUnit_Framework_TestCase
{
    private $returnAddress;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/return_address.xml',
            $this->returnAddress->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/return_address.xml',
            $this->returnAddress->pack());
    }

    protected function setUp()
    {
        $this->returnAddress = new InkRouter_Models_ReturnAddress();
        $this->returnAddress
            ->setStreetAddress('3911 Viewpark')
            ->setFirstName('John')
            ->setMiddleInitial('Jack')
            ->setLastName('Brown')
            ->setCity('Irvine')
            ->setState('CA')
            ->setZip('92612');
    }
}
