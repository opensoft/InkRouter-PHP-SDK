<?php

/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace InkRouter\Tests\Response;

use InkRouter\Response\Activity;
use InkRouter\Response\OrderItemUpdateRequest;
use InkRouter\Response\TrackingRequest;
use DateTime;
use PHPUnit\Framework\TestCase;

class OrderItemUpdateRequestTest extends TestCase
{
    public function testFinalShipUpdate()
    {
        $orderItemUpdate = OrderItemUpdateRequest::fromArray(json_decode($this->loadJson('final_ship_update'), true));
        self::assertEquals('FINAL_SHIP', $orderItemUpdate->updateType);
        self::assertEquals(637413352374116506, $orderItemUpdate->updateId);
        self::assertEquals(605390636, $orderItemUpdate->printCustomerOrderId);
        self::assertEquals('pg5f85f318c97f1', $orderItemUpdate->printCustomerOrderItemId);
        self::assertEquals(1000630984, $orderItemUpdate->printProviderOrderId);
        self::assertEquals("SHIPPING_VENDOR: 'UPS'; SHIP_TYPE: 'NEXT DAY AIR SAVER'; BOX ID: 'PRODBOX-192-36100';", $orderItemUpdate->note);
        self::assertEquals(120, $orderItemUpdate->quantity);
        self::assertEquals(0.268, $orderItemUpdate->weight);
        self::assertEquals(20.96, $orderItemUpdate->cost);
        self::assertEquals('1Z7R05701397525595', $orderItemUpdate->trackingNumber);
        self::assertEquals('2020-11-18T22:27:17+00:00', $orderItemUpdate->createDate->format(DateTime::RFC3339));
    }

    public function testPlaceOnSheetUpdate()
    {
        $orderItemUpdate = OrderItemUpdateRequest::fromArray(json_decode($this->loadJson('place_on_sheet_update'), true));
        self::assertEquals('PLACED_ON_SHEET', $orderItemUpdate->updateType);
        self::assertEquals(637413283849648655, $orderItemUpdate->updateId);
        self::assertEquals(605390636, $orderItemUpdate->printCustomerOrderId);
        self::assertEquals('pg5f85f318c97f1', $orderItemUpdate->printCustomerOrderItemId);
        self::assertEquals(1000630984, $orderItemUpdate->printProviderOrderId);
        self::assertEquals("<?xml version=\"1.0\"?>
<sheet_info><sheet_id>4849362</sheet_id><position>1</position><quantity>120</quantity><sides>1</sides><type>STKR-CIR-NEW-2-1up-20ea-1N</type></sheet_info>
", $orderItemUpdate->note);
        self::assertEquals(120, $orderItemUpdate->quantity);
        self::assertNull($orderItemUpdate->weight);
        self::assertNull($orderItemUpdate->cost);
        self::assertNull($orderItemUpdate->trackingNumber);
        self::assertEquals('2020-11-18T20:33:04+00:00', $orderItemUpdate->createDate->format(DateTime::RFC3339));
    }

    /**
     * @param string $updateName
     * @return string
     */
    protected function loadJson(string $updateName): string
    {
        $fileName = dirname(__FILE__) . '/../fixtures/json/response/' . $updateName . '.json';
        $file = fopen($fileName, 'r');
        $json = fread($file, filesize($fileName));
        fclose($file);

        return $json;
    }
}
