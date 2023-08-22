<?php
/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 */

/**
  * @author Vladimir Prudilin <vladimir.prudilin@opensoftdev.ru>
  */

namespace Tests\InkRouter\Models;

use Opensoft\InkRouterSdk\Models\PrintAsset;
use PHPUnit\Framework\TestCase;

class PrintAssetTest extends TestCase
{
    /**
     * @var PrintAsset
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
