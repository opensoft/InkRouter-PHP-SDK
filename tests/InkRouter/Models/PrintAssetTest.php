<?php
/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 */

/**
  * @author Vladimir Prudilin <vladimir.prudilin@opensoftdev.ru>
  */
class PrintAssetTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var InkRouter_Models_PrintAsset
     */
    private $printAsset;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/print_asset.xml', $this->printAsset->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/print_asset.xml', $this->printAsset->pack());
    }

    protected function setUp()
    {
        $this->printAsset = new InkRouter_Models_PrintAsset();
        $this->printAsset->setPositionX(4.98)
            ->setPositionY(3.1)
            ->setRotation(-90)
            ->setType('BARCODE')
            ->setHeight(0.543)
            ->setWidth(2.12);
    }
}
