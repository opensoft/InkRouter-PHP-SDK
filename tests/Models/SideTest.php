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

use InkRouter\Models\PrintAsset;
use InkRouter\Models\Side;
use PHPUnit\Framework\TestCase;

class SideTest extends TestCase
{
    /**
     * @param string $file
     * @param Side $side
     *
     * @dataProvider getSides
     */
    public function testPackWithRoot($file, Side $side)
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/xml/' . $file . '.xml', $side->pack(true));
    }

    /**
     * @param string $file
     * @param Side $side
     *
     * @dataProvider getSides
     */
    public function testPackWithoutRoot($file, Side $side)
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/xml/' . $file . '.xml', $side->pack());
    }

    /**
     * @return array
     */
    public function getSides()
    {
        return array(
            array('side', $this->getSide()),
            array('side_with_texture', $this->getSideWithTexture()),
            array('side_with_foil', $this->getSideWithFoil()),
        );
    }

    /**
     * @param string $file
     * @param Side $side
     *
     * @dataProvider getSides
     */
    public function testJsonSerialize($file, Side $side)
    {
        $this->assertJsonStringEqualsJsonFile(dirname(__FILE__) . '/../fixtures/json/' . $file . '.json', json_encode($side));
    }

    /**
     * @return Side
     */
    private function getSide()
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
            ->setLaminating('soft touch')
            ->addPrintAsset($printAsset);

        return $side;
    }

    /**
     * @return Side
     */
    private function getSideWithTexture()
    {
        $side = new Side();
        $side->setPageNumber(0)
            ->setFileUrl('http://server/images/business_cards/front/0.tif')
            ->setFileHash('0a0825909aa15a98b00574661f23aee7')
            ->setCoating('NONE')
            ->setOrientation('Landscape')
            ->setVariableUvFileUrl('http://server/images/business_cards/front/spot_uv.tif')
            ->setVariableUvFileHash('120825909aa15s2b00574661f23aee7');

        return $side;
    }

    /**
     * @return Side
     */
    private function getSideWithFoil()
    {
        $side = new Side();
        $side->setPageNumber(0)
            ->setFileUrl('http://server/images/business_cards/front/0.tif')
            ->setFileHash('0a0825909aa15a98b00574661f23aee7')
            ->setCoating('NONE')
            ->setOrientation('Landscape')
            ->setFoilFileUrl('http://server/images/business_cards/front/foil.tif')
            ->setFoilFileHash('120825909aa15s2b00574661f23aee7')
            ->setFoilColor('Silver');

        return $side;
    }
}
