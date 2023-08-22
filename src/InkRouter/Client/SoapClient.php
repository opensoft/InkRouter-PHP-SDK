<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Opensoft\InkRouterSdk\Client;

use \SoapFault;
use Opensoft\InkRouterSdk\Exceptions\Exception;
use Opensoft\InkRouterSdk\Exceptions\AuthenticationException;
use Opensoft\InkRouterSdk\Exceptions\InkRouterNotAvailableException;
use Opensoft\InkRouterSdk\Exceptions\ProcessingException;
use Opensoft\InkRouterSdk\Exceptions\RejectionException;
use Opensoft\InkRouterSdk\Exceptions\SoapFaultAdapter;
use Opensoft\InkRouterSdk\Models\OrderInfo;

/**
 * Client for sending requests to InkRouter
 *
 * @author Kirill Gusakov
 */
class SoapClient implements ClientInterface
{

    /**
     * @var string
     */
    private $wsdl;

    /**
     * @var SoapClient
     */
    private $soapClient;

    /**
     * Id associated with a certain print customer
     *
     * @var string
     */
    private $printCustomerId;

    /**
     * Key that is used by print customer for accessing InkRouter
     *
     * @var string
     */
    private $secretKey;

    /**
     * @var bool
     */
    private $connected;

    /**
     *
     * @param string $wsdl
     * @param string $printCustomerId
     * @param string $secretKey
     */
    public function __construct($wsdl, $printCustomerId, $secretKey)
    {
        $this->wsdl = $wsdl;
        $this->printCustomerId = $printCustomerId;
        $this->secretKey = $secretKey;
        $this->connected = false;
    }

    /**
     * @throws InkRouterNotAvailableException|Exception
     */
    public function connect()
    {
        if (!$this->connected) {
            try {
                $this->soapClient = @new SoapClient($this->wsdl);
            } catch (SoapFault $e) {
                throw SoapFaultAdapter::valueOf($e)->getException();
            }
        }

        $this->connected = true;

        return true;
    }

    /**
     * @param int $timestamp
     * @param OrderInfo $orderInfo
     * @return mixed
     * @throws InkRouterNotAvailableException|AuthenticationException|ProcessingException|RejectionException
     */
    public function createOrder($timestamp, OrderInfo $orderInfo)
    {
        $this->connect();

        try {
            return $this->soapClient->createOrder(array(
                'arg0' => $this->printCustomerId, 
                'arg1' => $this->secretKey, 
                'arg2' => $timestamp, 
                'arg3' => $orderInfo->pack(true)))->return; 
        } catch (SoapFault $e) {
            throw SoapFaultAdapter::valueOf($e)->getException();
        }
    }

    /**
     * @param int $orderId
     * @param int $timestamp
     * @param OrderInfo $orderInfo
     * @return mixed
     * @throws InkRouterNotAvailableException|AuthenticationException|ProcessingException|RejectionException
     */
    public function updateOrder($orderId, $timestamp, OrderInfo $orderInfo)
    {
        $this->connect();

        try {
            return $this->soapClient->updateOrder(array(
                'arg0' => $this->printCustomerId,
                'arg1' => $this->secretKey,
                'arg2' => $orderId,
                'arg3' => $timestamp,
                'arg4' => $orderInfo->pack()))->return;
        } catch (SoapFault $e) {
            throw SoapFaultAdapter::valueOf($e)->getException();
        }
    }

    /**
     * @param int $orderId
     * @param int $timestamp
     * @return mixed
     * @throws InkRouterNotAvailableException|AuthenticationException|ProcessingException|RejectionException
     */
    public function placeOnHold($orderId, $timestamp)
    {
        $this->connect();

        try {
            return $this->soapClient->placeOnHold(array(
                'arg0' => $this->printCustomerId,
                'arg1' => $this->secretKey,
                'arg2' => $orderId,
                'arg3' => $timestamp
            ))->return;
        } catch (SoapFault $e) {
            throw SoapFaultAdapter::valueOf($e)->getException();
        }
    }

    /**
     * @param int $orderId
     * @param int $timestamp
     * @return mixed
     * @throws InkRouterNotAvailableException|AuthenticationException|ProcessingException|RejectionException
     */
    public function removeHold($orderId, $timestamp)
    {
        $this->connect();

        try {
            return $this->soapClient->removeHold(array(
                'arg0' => $this->printCustomerId,
                'arg1' => $this->secretKey,
                'arg2' => $orderId,
                'arg3' => $timestamp
            ))->return;
        } catch (SoapFault $e) {
            throw SoapFaultAdapter::valueOf($e)->getException();
        }
    }

    /**
     * @param int $orderId
     * @param int $timestamp
     * @return mixed
     * @throws InkRouterNotAvailableException|AuthenticationException|ProcessingException|RejectionException
     */
    public function cancelOrder($orderId, $timestamp)
    {
        $this->connect();

        try {
            return $this->soapClient->cancelOrder(array(
                'arg0' => $this->printCustomerId,
                'arg1' => $this->secretKey,
                'arg2' => $orderId,
                'arg3' => $timestamp
            ))->return;
        } catch (SoapFault $e) {
            throw SoapFaultAdapter::valueOf($e)->getException();
        }
    }
}
