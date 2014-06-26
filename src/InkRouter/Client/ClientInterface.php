<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

interface InkRouter_Client_ClientInterface {
	
	/**
     * @param int $timestamp
     * @param InkRouter_Models_OrderInfo $orderInfo
     * @return mixed
     * @throws InkRouter_Exceptions_InkRouterNotAvailableException|InkRouter_Exceptions_AuthenticationException|InkRouter_Exceptions_ProcessingException|InkRouter_Exceptions_RejectionException
     */
    public function createOrder($timestamp, InkRouter_Models_OrderInfo $orderInfo);

    /**
     * @param int $orderId
     * @param int $timestamp
     * @param InkRouter_Models_OrderInfo $orderInfo
     * @return mixed
     * @throws InkRouter_Exceptions_InkRouterNotAvailableException|InkRouter_Exceptions_AuthenticationException|InkRouter_Exceptions_ProcessingException|InkRouter_Exceptions_RejectionException
     */
    public function updateOrder($orderId, $timestamp, InkRouter_Models_OrderInfo $orderInfo);

    /**
     * @param int $orderId
     * @param int $timestamp
     * @return mixed
     * @throws InkRouter_Exceptions_InkRouterNotAvailableException|InkRouter_Exceptions_AuthenticationException|InkRouter_Exceptions_ProcessingException|InkRouter_Exceptions_RejectionException
     */
    public function placeOnHold($orderId, $timestamp);

    /**
     * @param int $orderId
     * @param int $timestamp
     * @return mixed
     * @throws InkRouter_Exceptions_InkRouterNotAvailableException|InkRouter_Exceptions_AuthenticationException|InkRouter_Exceptions_ProcessingException|InkRouter_Exceptions_RejectionException
     */
    public function removeHold($orderId, $timestamp);

    /**
     * @param int $orderId
     * @param int $timestamp
     * @return mixed
     * @throws InkRouter_Exceptions_InkRouterNotAvailableException|InkRouter_Exceptions_AuthenticationException|InkRouter_Exceptions_ProcessingException|InkRouter_Exceptions_RejectionException
     */
    public function cancelOrder($orderId, $timestamp);
}
