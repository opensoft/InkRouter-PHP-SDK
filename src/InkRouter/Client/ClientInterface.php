<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Opensoft\InkRouterSdk\Client;

use Opensoft\InkRouterSdk\Exceptions\AuthenticationException;
use Opensoft\InkRouterSdk\Exceptions\InkRouterNotAvailableException;
use Opensoft\InkRouterSdk\Exceptions\ProcessingException;
use Opensoft\InkRouterSdk\Exceptions\RejectionException;
use Opensoft\InkRouterSdk\Models\OrderInfo;

interface ClientInterface {
	
	/**
     * @param int $timestamp
     * @param OrderInfo $orderInfo
     * @return mixed
     * @throws InkRouterNotAvailableException|AuthenticationException|ProcessingException|RejectionException
     */
    public function createOrder($timestamp, OrderInfo $orderInfo);

    /**
     * @param int $orderId
     * @param int $timestamp
     * @param OrderInfo $orderInfo
     * @return mixed
     * @throws InkRouterNotAvailableException|AuthenticationException|ProcessingException|RejectionException
     */
    public function updateOrder($orderId, $timestamp, OrderInfo $orderInfo);

    /**
     * @param int $orderId
     * @param int $timestamp
     * @return mixed
     * @throws InkRouterNotAvailableException|AuthenticationException|ProcessingException|RejectionException
     */
    public function placeOnHold($orderId, $timestamp);

    /**
     * @param int $orderId
     * @param int $timestamp
     * @return mixed
     * @throws InkRouterNotAvailableException|AuthenticationException|ProcessingException|RejectionException
     */
    public function removeHold($orderId, $timestamp);

    /**
     * @param int $orderId
     * @param int $timestamp
     * @return mixed
     * @throws InkRouterNotAvailableException|AuthenticationException|ProcessingException|RejectionException
     */
    public function cancelOrder($orderId, $timestamp);
}
