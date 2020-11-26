<?php

/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace InkRouter\Response;

/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.com>
 */
class TrackingAddress
{
    /**
     * @var string|null
     */
    public $city;

    /**
     * @var string|null
     */
    public $state;

    /**
     * @var string|null
     */
    public $country;

    /**
     * @param array $data
     * @return TrackingAddress
     */
    public static function fromArray(array $data): TrackingAddress
    {
        $trackingAddress = new self();
        $trackingAddress->city = $data['city'] ?? null;
        $trackingAddress->state = $data['state'] ?? null;
        $trackingAddress->country = $data['country'] ?? null;

        return $trackingAddress;
    }
}
