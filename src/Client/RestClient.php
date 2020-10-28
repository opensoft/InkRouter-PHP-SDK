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

use InkRouter\Exceptions\AuthenticationException;
use InkRouter\Exceptions\InkRouterNotAvailableException;
use InkRouter\Exceptions\ProcessingException;
use InkRouter\Exceptions\RejectionException;
use InkRouter\Models\OrderInfo;
use InkRouter\Exceptions\Exception;

/**
 * Client for sending requests to InkRouter
 *
 * @deprecated since v2
 * @author Kirill Gusakov
 */
class RestClient implements ClientInterface
{
    private static $CREATE_PATH = 'orders/%s';
    private static $UPDATE_PATH = 'orders/%s/%s';
    private static $CANCEL_PATH = 'orders/%s/%s';
    private static $HOLD_PATH = 'orders/hold/%s/%s';
    private static $REMOVE_HOLD_PATH = 'orders/remove_hold/%s/%s';

    /**
     * @var string
     */
    private $baseUrl;

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
     *
     * @param string $baseUrl
     * @param string $printCustomerId
     * @param string $secretKey
     */
    public function __construct($baseUrl, $printCustomerId, $secretKey)
    {
        $this->baseUrl = $baseUrl;
        $this->printCustomerId = $printCustomerId;
        $this->secretKey = $secretKey;
    }

    /**
     * @param int $timestamp
     * @param OrderInfo $orderInfo
     * @return mixed
     * @throws Exception
     */
    public function createOrder($timestamp, OrderInfo $orderInfo)
    {
        return $this->sendRequest(sprintf($this->baseUrl . self::$CREATE_PATH, $timestamp), 'POST', 
            array('Content-Type: application/xml'), $orderInfo->pack());
    }

    /**
     * @param int $orderId
     * @param int $timestamp
     * @param OrderInfo $orderInfo
     * @return mixed
     * @throws Exception
     */
    public function updateOrder($orderId, $timestamp, OrderInfo $orderInfo)
    {
        return $this->sendRequest(sprintf($this->baseUrl . self::$UPDATE_PATH, $orderId, $timestamp), 'PUT',
            array('Content-Type: application/xml'), $orderInfo->pack());
    }

    /**
     * @param int $orderId
     * @param int $timestamp
     * @return mixed
     * @throws Exception
     */
    public function placeOnHold($orderId, $timestamp)
    {
        return $this->sendRequest(sprintf($this->baseUrl . self::$HOLD_PATH, $orderId, $timestamp), 'PUT',
            array('Content-Type: text/plain'), '');
    }

    /**
     * @param int $orderId
     * @param int $timestamp
     * @return mixed
     * @throws Exception
     */
    public function removeHold($orderId, $timestamp)
    {
        return $this->sendRequest(sprintf($this->baseUrl . self::$REMOVE_HOLD_PATH, $orderId, $timestamp), 'PUT',
            array('Content-Type: text/plain'), '');
    }

    /**
     * @param int $orderId
     * @param int $timestamp
     * @return mixed
     * @throws Exception
     */
    public function cancelOrder($orderId, $timestamp)
    {
        return $this->sendRequest(sprintf($this->baseUrl . self::$CANCEL_PATH, $orderId, $timestamp), 'DELETE',
            array('Content-Type: text/plain'), '');
    }

    /**
     * @param $url
     * @param $httpMethod
     * @param $headers
     * @param null $body
     * @return bool|string
     */
    private function sendRequest($url, $httpMethod, $headers, $body = null) {
        $curlResource = curl_init();
        if ($body !== null) {
            switch ($httpMethod) {
                case 'POST':
                    curl_setopt($curlResource, CURLOPT_POSTFIELDS, $body);
                    break; 
                case 'PUT':
                    $fp = fopen('php://temp/maxmemory:256000', 'w');
                    fwrite($fp, $body);
                    fseek($fp, 0);
                    curl_setopt($curlResource, CURLOPT_BINARYTRANSFER, true);
                    curl_setopt($curlResource, CURLOPT_PUT, true);
                    curl_setopt($curlResource, CURLOPT_INFILE, $fp);
                    curl_setopt($curlResource, CURLOPT_INFILESIZE, strlen($body)); 
                    break;
                case 'DELETE':
                    curl_setopt($curlResource, CURLOPT_CUSTOMREQUEST, 'DELETE');
                    break;
            }
        }
        curl_setopt($curlResource, CURLOPT_URL, $url);
        curl_setopt($curlResource, CURLOPT_HTTPHEADER, 
            array_merge($headers, array('Authorization: Basic ' . base64_encode("{$this->printCustomerId}:{$this->secretKey}"))));
        curl_setopt($curlResource, CURLOPT_RETURNTRANSFER, true);
        $responseMessage = curl_exec($curlResource);
        if ($responseMessage === false) {
            throw new InkRouterNotAvailableException();
        }

        $statusCode = curl_getinfo($curlResource, CURLINFO_HTTP_CODE);
        switch ($statusCode) {
            case 201:
            case 200:
                return $responseMessage;
            case 401:
                throw new AuthenticationException($responseMessage);
            case 500:
                throw new ProcessingException($responseMessage);
            case 409:
                throw new RejectionException($responseMessage);
            default:
                throw new ProcessingException('Unknown error occured');
        }
    }
}
