<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2023 Opensoft (http://opensoftdev.com)
 */

namespace Tests\InkRouter\Models;

use Opensoft\InkRouterSdk\Models\Price;
use PHPUnit\Framework\TestCase;

class PriceTest extends TestCase
{
    public function testPrice()
    {
        $price = new Price();
        $price
            ->setType('COATING_SPOT_FRONT')
            ->setValue(5)
        ;

        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/price.xml', $price->pack(true));
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/price.xml', $price->pack());
    }
}
