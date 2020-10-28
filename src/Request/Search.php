<?php

/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace InkRouter\Request;

use DateTime;

/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.com>
 */
class Search implements \JsonSerializable
{
    public $transactionId;
    public $printProviderOrderId;
    public $printCustomerOrderId;
    /**
     * @var DateTime
     */
    public $from;

    public function jsonSerialize()
    {
        return [
            'transactionId' => $data['transactionId'] ?? null,
            'printProviderOrderId' => $data['printProviderOrderId'] ?? null,
            'printCustomerOrderId' => $data['printCustomerOrderId'] ?? null,
            'from' => !empty($this->from) ? $this->from->format(DateTime::RFC3339) : null
        ];
    }


    /**
     * @param array $data
     * @return Search
     */
    public static function fromArray(array $data)
    {
        $request = new self();
        $request->transactionId = $data['transactionId'] ?? null;
        $request->printProviderOrderId = $data['printProviderOrderId'] ?? null;
        $request->printCustomerOrderId = $data['printCustomerOrderId'] ?? null;
        $request->from = new DateTime($data['from']) ?? null;

        return $request;
    }
}
