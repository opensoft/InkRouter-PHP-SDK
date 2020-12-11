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
        self::assertEquals('2020-11-19T04:08:00+00:00', $tracking->created->format(DateTime::RFC3339));
        self::assertEquals('InTransit', $tracking->status);
        self::assertEquals('Departed from Facility', $tracking->description);
        self::assertInstanceOf(TrackingAddress::class, $tracking->address);
    }

    public function testToArray()
    {
        $tracking = Activity::fromArray(json_decode($this->json, true));
        self::assertJsonStringEqualsJsonString($this->json, json_encode($tracking->toArray()));
    }

    protected function setUp(): void
    {
        $fileName = dirname(__FILE__) . '/../fixtures/json/response/activity.json';
        $file = fopen($fileName, 'r');
        $this->json = fread($file, filesize($fileName));
        fclose($file);
    }
}
