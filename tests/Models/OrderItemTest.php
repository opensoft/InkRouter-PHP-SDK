<?php

/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace InkRouter\Tests\Models;

use InkRouter\Models\Attributes\ScalarBooleanAttribute;
use InkRouter\Models\OrderItem;
use InkRouter\Models\PrintAsset;
use InkRouter\Models\Side;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

class OrderItemTest extends TestCase
{
    /**
     * @var OrderItem
     */
    private $orderItem;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/xml/order_item.xml',
            $this->orderItem->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/xml/order_item.xml',
            $this->orderItem->pack());
    }

    public function testJsonSerialize()
    {
        $this->assertJsonStringEqualsJsonFile(
            dirname(__FILE__) . '/../fixtures/json/order_item.json',
            json_encode($this->orderItem)
        );
    }

    public function testMinRangeValueInQualityField()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("The specified value for qualityPriority is not valid");
        $this->orderItem->setQualityPriority(0);
    }

    public function testMaxRangeValueInQualityField()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("The specified value for qualityPriority is not valid");
        $this->orderItem->setQualityPriority(11);
    }

    public function testMinRangeValueInSlaField()
    {
        $this->expectExceptionMessage("The specified value for slaPriority is not valid");
        $this->expectException(InvalidArgumentException::class);
        $this->orderItem->setSlaPriority(0);
    }

    public function testMaxRangeValueInSlaField()
    {
        $this->expectExceptionMessage("The specified value for slaPriority is not valid");
        $this->expectException(InvalidArgumentException::class);
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
            ->setInspection('Inspect this item');
    }
}
