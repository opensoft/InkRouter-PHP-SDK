<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2023 Opensoft (http://opensoftdev.com)
 */

class PriceTest extends PHPUnit_Framework_TestCase
{
    public function testPrice()
    {
        $price = new InkRouter_Models_Price();
        $price
            ->setType('COATING_SPOT_FRONT')
            ->setValue(5)
        ;

        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/price.xml', $price->pack(true));
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/price.xml', $price->pack());
    }
}
