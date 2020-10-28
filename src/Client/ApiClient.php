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

use DateTime;
use InkRouter\Exceptions\Exception;
use InkRouter\Models\OrderInfo as ModelOrderInfo;
use InkRouter\Request\Action;
use InkRouter\Request\OrderInfo;
use InkRouter\Request\OrderInfoAdapter;
use InkRouter\Request\Search;
use InkRouter\Response\CreateResponse;
use InkRouter\Response\GetResponse;
use InkRouter\Response\UpdateResponse;

/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.com>
 */
class ApiClient implements ClientInterface
{
    private const CREATE_PATH = 'api/v2/order';
    private const UPDATE_PATH = 'api/v2/order/%s';
    private const STATUS_PATH = 'api/v2/order/%s/status';
    private const CANCEL_ORDER_ITEM_PATH = 'api/v2/order/%s/item/%s';
    private const GET_TRANSACTION = 'api/v2/transactions/%d/status';
    private const GET_TRANSACTIONS_FROM = 'api/v2/pull?from=%s';
    private const SEARCH_TRANSACTIONS = 'api/v2/pull';

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
     * @var HttpClientInterface
     */
    private $client;

    /**
     * @param string $baseUrl
     * @param string $printCustomerId
     * @param string $secretKey
     * @param HttpClientInterface $client
     */
    public function __construct($baseUrl, $printCustomerId, $secretKey, HttpClientInterface $client)
    {
        $this->baseUrl = $baseUrl;
        $this->printCustomerId = $printCustomerId;
        $this->secretKey = $secretKey;
        $this->client = $client;
    }

    /**
     * @param OrderInfo $orderInfo
     * @return CreateResponse
     */
    public function create(OrderInfo $orderInfo): CreateResponse
    {
        $response = $this->client->send(
            $this->baseUrl . self::CREATE_PATH,
            'POST',
            $this->getHeaders(),
            json_encode($orderInfo)
        );

        return CreateResponse::fromArray($response->getMessage(), $response->getStatus());
    }

    /**
     * @param $orderId
     * @param OrderInfo $orderInfo
     * @return UpdateResponse
     */
    public function update($orderId, OrderInfo $orderInfo): UpdateResponse
    {
        $response = $this->client->send(
            sprintf($this->baseUrl . self::UPDATE_PATH, $orderId),
            'POST',
            $this->getHeaders(),
            json_encode($orderInfo)
        );

        return UpdateResponse::fromArray($response->getMessage(), $response->getStatus());
    }

    /**
     * @param $orderId
     * @param $orderItemId
     * @return UpdateResponse
     */
    public function cancelOrderItem($orderId, $orderItemId): UpdateResponse
    {
        $response = $this->client->send(
            sprintf($this->baseUrl . self::CANCEL_ORDER_ITEM_PATH, $orderId, $orderItemId),
            'POST',
            $this->getHeaders(),
            json_encode(Action::getInstance(Action::ACTION_CANCEL))
        );

        return UpdateResponse::fromArray($response->getMessage(), $response->getStatus());
    }

    /**
     * @param $orderId
     * @param Action $action
     * @return UpdateResponse
     */
    public function actionByOrder($orderId, Action $action): UpdateResponse
    {
        $response = $this->client->send(
            sprintf($this->baseUrl . self::STATUS_PATH, $orderId),
            'POST',
            $this->getHeaders(),
            json_encode($action)
        );

        return UpdateResponse::fromArray($response->getMessage(), $response->getStatus());
    }

    /**
     * @param array $data
     * @return GetResponse
     */
    public function searchTransactions(array $data): GetResponse
    {
        $response = $this->client->send(
            $this->baseUrl . self::SEARCH_TRANSACTIONS,
            'POST',
            $this->getHeaders(),
            json_encode(Search::fromArray($data))
        );

        return GetResponse::fromArray($response->getMessage(), $response->getStatus());
    }

    /**
     * @param DateTime $date
     * @return GetResponse
     */
    public function getTransactionsFromDate(DateTime $date): GetResponse
    {
        $response = $this->client->send(
            sprintf($this->baseUrl . self::GET_TRANSACTIONS_FROM, $date->format(DateTime::RFC3339)),
            'GET',
            $this->getHeaders(),
            null
        );

        return GetResponse::fromArray($response->getMessage(), $response->getStatus());
    }

    /**
     * @param int $transactionId
     * @throws Exception
     * @return GetResponse
     */
    public function getTransaction(int $transactionId): GetResponse
    {
        $response = $this->client->send(
            sprintf($this->baseUrl . self::GET_TRANSACTION, $transactionId),
            'GET',
            $this->getHeaders(),
            null
        );

        return GetResponse::fromArray($response->getMessage(), $response->getStatus());
    }

    /**
     * @deprecated since v2
     * @param int $timestamp
     * @param ModelOrderInfo $modelOrderInfo
     * @return bool|mixed|string
     */
    public function createOrder($timestamp, ModelOrderInfo $modelOrderInfo)
    {
        return $this->create(OrderInfoAdapter::adopt($modelOrderInfo));
    }

    /**
     * @deprecated since v2
     * @param int $orderId
     * @param int $timestamp
     * @param ModelOrderInfo $modelOrderInfo
     * @return bool|mixed|string
     */
    public function updateOrder($orderId, $timestamp, ModelOrderInfo $modelOrderInfo)
    {
        return $this->update($orderId, OrderInfoAdapter::adopt($modelOrderInfo));
    }

    /**
     * @deprecated since v2
     * @param int $orderId
     * @param int $timestamp
     * @return bool|mixed|string
     */
    public function placeOnHold($orderId, $timestamp)
    {
        return $this->actionByOrder($orderId, Action::getInstance(Action::ACTION_HOLD));
    }

    /**
     * @deprecated since v2
     * @param int $orderId
     * @param int $timestamp
     * @return bool|mixed|string
     */
    public function removeHold($orderId, $timestamp)
    {
        return $this->actionByOrder($orderId, Action::getInstance(Action::ACTION_RELEASE));
    }

    /**
     * @deprecated since v2
     * @param int $orderId
     * @param int $timestamp
     * @return bool|mixed|string
     */
    public function cancelOrder($orderId, $timestamp)
    {
        return $this->actionByOrder($orderId, Action::getInstance(Action::ACTION_CANCEL));
    }

    /**
     * @return string[]
     */
    private function getHeaders(): array
    {
        return [
            'Content-Type: application/json',
            'X-InkRouter-Client: ' . $this->printCustomerId,
            'X-InkRouter-ApiKey: ' . $this->secretKey
        ];
    }
}
