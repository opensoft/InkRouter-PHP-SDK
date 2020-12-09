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

use InkRouter\Response\TrackingAddress;
use PHPUnit\Framework\TestCase;

class TrackingAddressTest extends TestCase
{
    private $json;

    public function testFromArray()
    {
        $tracking = TrackingAddress::fromArray(json_decode($this->json, true));
        self::assertEquals('Louisville', $tracking->city);
        self::assertEquals('KY', $tracking->state);
        self::assertEquals('US', $tracking->country);
    }

    protected function setUp(): void
    {
        $fileName = dirname(__FILE__) . '/../fixtures/json/response/tracking_address.json';
        $file = fopen($fileName, 'r');
        $this->json = fread($file, filesize($fileName));
        fclose($file);
    }
}
