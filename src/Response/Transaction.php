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

use DateTime;

/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.com>
 */
class Transaction
{
    /**
     * @var string
     */
    public $transactionId;

    /**
     * @var string
     */
    public $printProviderOrderId;

    /**
     * @var string
     */
    public $transactionType;

    /**
     * @var string
     */
    public $printCustomerOrderId;

    /**
     * @var integer
     */
    public $updateId;

    /**
     * @var DateTime
     */
    public $createDate;

    /**
     * @var Error|null
     */
    public $errors;

    /**
     * @var boolean
     */
    public $success;

    /**
     * @param $data
     * @return Transaction
     */
    public static function fromArray($data)
    {
        $response = new self();
        $response->success = (bool) $data['success'];
        $response->errors = isset($data['errors']) ? Error::fromArray($data['errors']) : null;
        $response->transactionId = $data['transactionId'] ?? null;
        $response->printProviderOrderId = $data['printProviderOrderId'] ?? null;
        $response->printCustomerOrderId = $data['printCustomerOrderId'] ?? null;
        $response->updateId = $data['updateId'] ?? null;
        $response->createDate = new DateTime($data['createDate']) ?? null;

        return $response;
    }
}
