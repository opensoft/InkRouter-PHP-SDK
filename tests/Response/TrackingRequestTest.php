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
        $this->assertEquals('SHIP_TRACKING', $tracking->updateType);
        $this->assertEquals('1Z7R05701397525595', $tracking->trackingNumber);
        $this->assertEquals(0.3, $tracking->weight);
        $this->assertEquals('2020-11-19T00:00:00+00:00', $tracking->expectedDeliveryDate->format(DateTime::RFC3339));
        $this->assertEquals('013', $tracking->serviceCode);
        $this->assertEquals('UPS', $tracking->shipperType);
        $this->assertNotEmpty($tracking->activity);
        $this->assertContainsOnlyInstancesOf(Activity::class, $tracking->activity);
    }

    protected function setUp(): void
    {
        $fileName = dirname(__FILE__) . '/../fixtures/json/response/tracking_request.json';
        $file = fopen($fileName, 'r');
        $this->json = fread($file, filesize($fileName));
        fclose($file);
    }
}
