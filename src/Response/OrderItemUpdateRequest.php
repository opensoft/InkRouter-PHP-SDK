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
class OrderItemUpdateRequest
{
    /**
     * @var int
     */
    public $updateId;

    /**
     * @var string
     */
    public $updateType;

    /**
     * @var string
     */
    public $printProviderOrderId;

    /**
     * @var string
     */
    public $printCustomerOrderId;

    /**
     * @var string
     */
    public $printCustomerOrderItemId;

    /**
     * @var string
     */
    public $note;

    /**
     * @var int
     */
    public $quantity;

    /**
     * @var float|null
     */
    public $weight;

    /**
     * @var float|null
     */
    public $cost;

    /**
     * @var string|null
     */
    public $trackingNumber;

    /**
     * @var DateTime
     */
    public $createDate;

    /**
     * @param array $data
     * @return OrderItemUpdateRequest
     */
    public static function fromArray(array $data): OrderItemUpdateRequest
    {
        $orderItemUpdateRequest = new self();
        $orderItemUpdateRequest->updateId = $data['updateId'];
        $orderItemUpdateRequest->updateType = $data['updateType'];
        $orderItemUpdateRequest->printProviderOrderId = $data['printProviderOrderId'];
        $orderItemUpdateRequest->printCustomerOrderId = $data['printCustomerOrderId'];
        $orderItemUpdateRequest->printCustomerOrderItemId = $data['printCustomerOrderItemId'];
        $orderItemUpdateRequest->note = $data['note'];
        $orderItemUpdateRequest->quantity = $data['quantity'];
        $orderItemUpdateRequest->weight = $data['weight'] ?? null;
        $orderItemUpdateRequest->cost = $data['cost'] ?? null;
        $orderItemUpdateRequest->trackingNumber = $data['trackingNumber'] ?? null;
        $orderItemUpdateRequest->createDate = new DateTime($data['createDate']);

        return $orderItemUpdateRequest;
    }
}
