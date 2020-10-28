<?php

/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace InkRouter\Client;

use InkRouter\Exceptions\Exception;
use InkRouter\Models\OrderInfo;

/**
 * @deprecated since v2
 */
interface ClientInterface
{
    /**
     * @deprecated since v2
     * @param int $timestamp
     * @param OrderInfo $orderInfo
     * @return mixed
     * @throws Exception
     */
    public function createOrder($timestamp, OrderInfo $orderInfo);

    /**
     * @deprecated since v2
     * @param int $orderId
     * @param int $timestamp
     * @param OrderInfo $orderInfo
     * @return mixed
     * @throws Exception
     */
    public function updateOrder($orderId, $timestamp, OrderInfo $orderInfo);

    /**
     * @deprecated since v2
     * @param int $orderId
     * @param int $timestamp
     * @return mixed
     * @throws Exception
     */
    public function placeOnHold($orderId, $timestamp);

    /**
     * @deprecated since v2
     * @param int $orderId
     * @param int $timestamp
     * @return mixed
     * @throws Exception
     */
    public function removeHold($orderId, $timestamp);

    /**
     * @deprecated since v2
     * @param int $orderId
     * @param int $timestamp
     * @return mixed
     * @throws Exception
     */
    public function cancelOrder($orderId, $timestamp);
}
