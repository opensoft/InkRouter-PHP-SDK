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

use \DateTime;

/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.com>
 */
class TrackingRequest
{
    /**
     * @var string|null
     */
    public $updateType;

    /**
     * @var string|null
     */
    public $trackingNumber;

    /**
     * @var float|null
     */
    public $weight;

    /**
     * @var Activity[]
     */
    public $activity = [];

    /**
     * @var DateTime|null
     */
    public $expectedDeliveryDate;

    /**
     * @var string|null
     */
    public $serviceCode;

    /**
     * @var string|null
     */
    public $shipperType;

    /**
     * @param $data
     * @return TrackingRequest
     */
    public static function fromArray(array $data): TrackingRequest
    {
        $trackingRequest = new self();
        $trackingRequest->updateType = $data['updateType'] ?? null;
        $trackingRequest->trackingNumber = $data['trackingNumber'] ?? null;
        $trackingRequest->weight = $data['weight'] ?? null;
        $trackingRequest->expectedDeliveryDate = isset($data['expectedDeliveryDate']) ? new DateTime($data['expectedDeliveryDate']) : null;
        $trackingRequest->serviceCode = $data['serviceCode'] ?? null;
        $trackingRequest->shipperType = $data['shipperType'] ?? null;
        $trackingRequest->fillActivity($data);

        return $trackingRequest;
    }

    private function fillActivity($data)
    {
        if (!isset($data['activity'])) {
            return;
        }
        $activities = [];
        foreach ($data['activity'] as $activityData) {
            $activities[] = Activity::fromArray($activityData);
        }
        $this->activity = $activities;
    }
}
