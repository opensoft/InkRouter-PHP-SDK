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

/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.com>
 */
class CreateResponse
{
    /**
     * JSI order Id
     *
     * @var int|null
     */
    public $reference;

    /**
     * @var int|null
     */
    public $transactionId;

    /**
     * @var Error|null
     */
    public $errors;

    /**
     * @var boolean
     */
    public $success;

    /**
     * @var int
     */
    public $status;

    /**
     * @param array $data
     * @param int $status
     * @return CreateResponse
     */
    public static function fromArray(array $data, int $status)
    {
        $response = new self();
        $response->status = $status;
        $response->success = (bool) $data['success'];
        $response->transactionId = $data['transactionId'] ?? null;
        $response->reference = $data['reference'] ?? null;
        $response->errors = isset($data['errors']) ? Error::fromArray($data['errors']) : null;

        return $response;
    }
}
