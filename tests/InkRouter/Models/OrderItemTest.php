<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Tests\InkRouter\Models;

use \InvalidArgumentException;
use Opensoft\InkRouterSdk\Models\Attributes\ScalarBooleanAttribute;
use Opensoft\InkRouterSdk\Models\OrderItem;
use Opensoft\InkRouterSdk\Models\Price;
use Opensoft\InkRouterSdk\Models\PrintAsset;
use Opensoft\InkRouterSdk\Models\Side;
use PHPUnit\Framework\TestCase;

class OrderItemTest extends TestCase
{
    /**
     * @var OrderItem
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

    public function testMinRangeValueInQualityField()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The specified value for qualityPriority is not valid');
        $this->orderItem->setQualityPriority(0);
    }

    public function testMaxRangeValueInQualityField()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The specified value for qualityPriority is not valid');
        $this->orderItem->setQualityPriority(11);
    }

    public function testMinRangeValueInSlaField()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The specified value for slaPriority is not valid');
        $this->orderItem->setSlaPriority(0);
    }

    public function testMaxRangeValueInSlaField()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The specified value for slaPriority is not valid');
        $this->orderItem->setSlaPriority(11);
    }

    protected function setUp(): void
    {
        $printAsset = new PrintAsset();
        $printAsset->setPositionX(4.98)
            ->setPositionY(3.1)
            ->setRotation(-90)
            ->setType('BARCODE')
            ->setHeight(0.543)
            ->setWidth(2.12);

        $side = new Side();
        $side->setPageNumber(10)
            ->setFileUrl('http://server/images/business_cards/front/0.tif')
            ->setFileHash('0a0825909aa15a98b00574661f23aee7')
            ->setCoating('NONE')
            ->setOrientation('Landscape')
            ->setSpotUvFileUrl('http://server/images/business_cards/front/spot_uv.tif')
            ->setSpotUvFileHash('120825909aa15s2b00574661f23aee7')
            ->addPrintAsset($printAsset);

        $attributes = new ScalarBooleanAttribute();
        $attributes->setType('LABELING');
        $attributes->setValue(true);

        $price1 = new Price();
        $price1->setType('COATING_SPOT_FRONT');
        $price1->setValue(5);
        $price2 = new Price();
        $price2->setType('COATING_SPOT_BACK');
        $price2->setValue(10);

        $this->orderItem = new OrderItem();
        $this->orderItem->setPrintGroupId('pg4f7969f8a4800')
            ->setProductType('business cards')
            ->setPaperType('14PT')
            ->setDaVinciDesignId('d9ea738d-a7e8-4f7e-ab36-f1d9284701e2')
            ->setQuantity(500)
            ->setRegionSize('US')
            ->setCost('cost')
            ->setQualityPriority(5)
            ->setSlaPriority(7)
            ->addAttributes($attributes)
            ->addSide($side)
            ->setInspection('Inspect this item')
            ->addPrice($price1)
            ->addPrice($price2)
        ;
    }
}
