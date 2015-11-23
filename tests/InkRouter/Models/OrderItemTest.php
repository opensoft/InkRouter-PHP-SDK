<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

class OrderItemTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \InkRouter_Models_OrderItem
     */
    private $orderItem;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/order_item.xml',
            $this->orderItem->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/order_item.xml',
            $this->orderItem->pack());
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage The specified value for qualityPriority is not valid
     */
    public function testMinRangeValueInQualityField()
    {
        $this->orderItem->setQualityPriority(0);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage The specified value for qualityPriority is not valid
     */
    public function testMaxRangeValueInQualityField()
    {
        $this->orderItem->setQualityPriority(11);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage The specified value for slaPriority is not valid
     */
    public function testMinRangeValueInSlaField()
    {
        $this->orderItem->setSlaPriority(0);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage The specified value for slaPriority is not valid
     */
    public function testMaxRangeValueInSlaField()
    {
        $this->orderItem->setSlaPriority(11);
    }

    protected function setUp()
    {
        $printAsset = new InkRouter_Models_PrintAsset();
        $printAsset->setPositionX(4.98)
            ->setPositionY(3)
            ->setRotation(-90)
            ->setType('BARCODE')
            ->setHeight(3.55)
            ->setWidth(3.612);

        $side = new InkRouter_Models_Side();
        $side->setPageNumber(10)
            ->setFileUrl('http://server/images/business_cards/front/0.tif')
            ->setFileHash('0a0825909aa15a98b00574661f23aee7')
            ->setCoating('NONE')
            ->setOrientation('Landscape')
            ->setSpotUvFileUrl('http://server/images/business_cards/front/spot_uv.tif')
            ->setSpotUvFileHash('120825909aa15s2b00574661f23aee7')
            ->addPrintAsset($printAsset);

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
            ->setQualityPriority(5)
            ->setSlaPriority(7)
            ->addAttributes($attributes)
            ->addSide($side)
            ->setInspection('Inspect this item');
    }
}
