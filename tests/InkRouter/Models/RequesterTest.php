<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Tests\InkRouter\Models;

use Opensoft\InkRouterSdk\Models\Requester;
use PHPUnit\Framework\TestCase;

class RequesterTest extends TestCase
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

    protected function setUp(): void
    {
        $this->requester = new Requester();
        $this->requester->setName('Jaisor Prints')
            ->setContract('STANDARD')
            ->setPayTerm('FREE');
    }
}
