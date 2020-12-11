<?php
/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 */

namespace InkRouter\Tests\Models;

use InkRouter\Models\PrintAsset;
use PHPUnit\Framework\TestCase;

/**
  * @author Vladimir Prudilin <vladimir.prudilin@opensoftdev.ru>
  */
class PrintAssetTest extends TestCase
{
    /**
     * @var PrintAsset
     */
    private $printAsset;

    public function testPackWithRoot()
    {
        self::assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/xml/print_asset.xml', $this->printAsset->pack());
    }

    public function testPackWithoutRoot()
    {
        self::assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/xml/print_asset.xml', $this->printAsset->pack());
    }

    public function testJsonSerialize()
    {
        self::assertJsonStringEqualsJsonFile(
            dirname(__FILE__) . '/../fixtures/json/print_asset.json',
            json_encode($this->printAsset)
        );
    }

    protected function setUp(): void
    {
        $this->printAsset = new PrintAsset();
        $this->printAsset->setPositionX(4.98)
            ->setPositionY(3.1)
            ->setRotation(-90)
            ->setType('BARCODE')
            ->setHeight(0.543)
            ->setWidth(2.12);
    }
}
