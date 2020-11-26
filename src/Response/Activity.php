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
class Activity
{
    /**
     * @var DateTime|null
     */
    public $created;

    /**
     * @var string|null
     */
    public $status;

    /**
     * @var string|null
     */
    public $description;

    /**
     * @var TrackingAddress|null
     */
    public $address;

    /**
     * @param array $data
     * @return Activity
     */
    public static function fromArray(array $data): Activity
    {
        $activity = new self();
        $activity->created = isset($data['created']) ? new DateTime($data['created']) : null;
        $activity->status = $data['status'] ?? null;
        $activity->description = $data['description'] ?? null;
        $activity->address = isset($data['address']) ? TrackingAddress::fromArray($data['address']) : null;

        return $activity;
    }
}
