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

interface ClientInterface
{
    /**
     * @param int $timestamp
     * @param OrderInfo $orderInfo
     * @return mixed
     * @throws Exception
     */
    public function createOrder($timestamp, OrderInfo $orderInfo);

    /**
     * @param int $orderId
     * @param int $timestamp
     * @param OrderInfo $orderInfo
     * @return mixed
     * @throws Exception
     */
    public function updateOrder($orderId, $timestamp, OrderInfo $orderInfo);

    /**
     * @param int $orderId
     * @param int $timestamp
     * @return mixed
     * @throws Exception
     */
    public function placeOnHold($orderId, $timestamp);

    /**
     * @param int $orderId
     * @param int $timestamp
     * @return mixed
     * @throws Exception
     */
    public function removeHold($orderId, $timestamp);

    /**
     * @param int $orderId
     * @param int $timestamp
     * @return mixed
     * @throws Exception
     */
    public function cancelOrder($orderId, $timestamp);
}
