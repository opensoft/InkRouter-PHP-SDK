<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

class RangeAndDimensionTest extends PHPUnit_Framework_TestCase
{

    private $orderItem;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/range_and_dimension_options.xml',
            $this->orderItem->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/range_and_dimension_options.xml',
            $this->orderItem->pack());
    }

    protected function setUp()
    {
        $side = new InkRouter_Models_Side();
        $side->setPageNumber(10)
            ->setFileUrl('http://server/images/business_cards/front/0.tif')
            ->setFileHash('0a0825909aa15a98b00574661f23aee7')
            ->setCoating('NONE')
            ->setOrientation('Landscape')
            ->setSpotUvFileUrl('http://server/images/business_cards/front/spot_uv.tif')
            ->setSpotUvFileHash('120825909aa15s2b00574661f23aee7');

        $attributes = new InkRouter_Models_Attributes_ScalarBooleanAttribute();
        $attributes->setType('LABELING');
        $attributes->setValue(true);

        $this->orderItem = new InkRouter_Models_OrderItem();
        $this->orderItem->setPrintGroupId('pg4f7969f8a4800')
            ->setProductType('business cards')
            ->setPaperType('14PT')
            ->setQuantity(500)
            ->setRegionSize('US')
            ->setCost('cost')
            ->addAttributes($attributes)
            ->addSide($side)
            ->setInspection('Inspect this item');
    }
}
