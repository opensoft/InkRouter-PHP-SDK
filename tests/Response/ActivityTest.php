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
use InkRouter\Response\TrackingAddress;
use DateTime;
use PHPUnit\Framework\TestCase;

class ActivityTest extends TestCase
{
    private $json;

    public function testFromArray()
    {
        $tracking = Activity::fromArray(json_decode($this->json, true));
        $this->assertEquals('2020-11-19T04:08:00+00:00', $tracking->created->format(DateTime::RFC3339));
        $this->assertEquals('InTransit', $tracking->status);
        $this->assertEquals('Departed from Facility', $tracking->description);
        $this->assertInstanceOf(TrackingAddress::class, $tracking->address);
    }

    protected function setUp(): void
    {
        $fileName = dirname(__FILE__) . '/../fixtures/json/response/activity.json';
        $file = fopen($fileName, 'r');
        $this->json = fread($file, filesize($fileName));
        fclose($file);
    }
}
