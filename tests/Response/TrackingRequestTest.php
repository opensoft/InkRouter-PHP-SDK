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
use InkRouter\Response\TrackingRequest;
use DateTime;
use PHPUnit\Framework\TestCase;

class TrackingRequestTest extends TestCase
{
    private $json;

    public function testFromArray()
    {
        $tracking = TrackingRequest::fromArray(json_decode($this->json, true));
        self::assertEquals('SHIP_TRACKING', $tracking->updateType);
        self::assertEquals('1Z7R05701397525595', $tracking->trackingNumber);
        self::assertEquals(0.3, $tracking->weight);
        self::assertEquals('2020-11-19T00:00:00+00:00', $tracking->expectedDeliveryDate->format(DateTime::RFC3339));
        self::assertEquals('013', $tracking->serviceCode);
        self::assertEquals('UPS', $tracking->shipperType);
        self::assertNotEmpty($tracking->activity);
        self::assertContainsOnlyInstancesOf(Activity::class, $tracking->activity);
    }

    protected function setUp(): void
    {
        $fileName = dirname(__FILE__) . '/../fixtures/json/response/tracking_request.json';
        $file = fopen($fileName, 'r');
        $this->json = fread($file, filesize($fileName));
        fclose($file);
    }
}
