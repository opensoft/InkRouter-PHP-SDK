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
use InkRouter\Exceptions\InkRouterNotAvailableException;
use InkRouter\Exceptions\SoapFaultAdapter;
use InkRouter\Models\OrderInfo;
use SoapFault;
use \SoapClient as BaseSoapClient;

/**
 * Client for sending requests to InkRouter
 *
 * @deprecated since v2
 * @author Kirill Gusakov
 */
class SoapClient implements ClientInterface
{

    /**
     * @var string
     */
    private $wsdl;

    /**
     * @var BaseSoapClient
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
                $this->soapClient = @new BaseSoapClient($this->wsdl);
            } catch (SoapFault $e) {
                throw SoapFaultAdapter::valueOf($e)->getException();
            }
        }

        $this->connected = true;

        return true;
    }

    /**
     * @param int $printCustomerOuterOrderId
     * @param OrderInfo $orderInfo
     * @return mixed
     * @throws Exception
     */
    public function createOrder($printCustomerOuterOrderId, OrderInfo $orderInfo)
    {
        $this->connect();

        try {
            return $this->soapClient->createOrder(array(
                'arg0' => $this->printCustomerId, 
                'arg1' => $this->secretKey, 
                'arg2' => $printCustomerOuterOrderId,
                'arg3' => $orderInfo->pack(true)))->return; 
        } catch (SoapFault $e) {
            throw SoapFaultAdapter::valueOf($e)->getException();
        }
    }

    /**
     * @param int $printProviderOrderId
     * @param int $printCustomerOuterOrderId
     * @param OrderInfo $orderInfo
     * @return mixed
     * @throws Exception
     */
    public function updateOrder($printProviderOrderId, $printCustomerOuterOrderId, OrderInfo $orderInfo)
    {
        $this->connect();

        try {
            return $this->soapClient->updateOrder(array(
                'arg0' => $this->printCustomerId,
                'arg1' => $this->secretKey,
                'arg2' => $printProviderOrderId,
                'arg3' => $printCustomerOuterOrderId,
                'arg4' => $orderInfo->pack()))->return;
        } catch (SoapFault $e) {
            throw SoapFaultAdapter::valueOf($e)->getException();
        }
    }

    /**
     * @param int $printProviderOrderId
     * @param int $printCustomerOuterOrderId
     * @return mixed
     * @throws Exception
     */
    public function placeOnHold($printProviderOrderId, $printCustomerOuterOrderId)
    {
        $this->connect();

        try {
            return $this->soapClient->placeOnHold(array(
                'arg0' => $this->printCustomerId,
                'arg1' => $this->secretKey,
                'arg2' => $printProviderOrderId,
                'arg3' => $printCustomerOuterOrderId
            ))->return;
        } catch (SoapFault $e) {
            throw SoapFaultAdapter::valueOf($e)->getException();
        }
    }

    /**
     * @param int $printProviderOrderId
     * @param int $printCustomerOuterOrderId
     * @return mixed
     * @throws Exception
     */
    public function removeHold($printProviderOrderId, $printCustomerOuterOrderId)
    {
        $this->connect();

        try {
            return $this->soapClient->removeHold(array(
                'arg0' => $this->printCustomerId,
                'arg1' => $this->secretKey,
                'arg2' => $printProviderOrderId,
                'arg3' => $printCustomerOuterOrderId
            ))->return;
        } catch (SoapFault $e) {
            throw SoapFaultAdapter::valueOf($e)->getException();
        }
    }

    /**
     * @param int $printProviderOrderId
     * @param int $printCustomerOuterOrderId
     * @return mixed
     * @throws Exception
     */
    public function cancelOrder($printProviderOrderId, $printCustomerOuterOrderId)
    {
        $this->connect();

        try {
            return $this->soapClient->cancelOrder([
                'arg0' => $this->printCustomerId,
                'arg1' => $this->secretKey,
                'arg2' => $printProviderOrderId,
                'arg3' => $printCustomerOuterOrderId
            ])->return;
        } catch (SoapFault $e) {
            throw SoapFaultAdapter::valueOf($e)->getException();
        }
    }
}
