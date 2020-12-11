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
class GetResponse
{
    /**
     * @var Transaction[]|null
     */
    public $data;

    /**
     * @var Error|null
     */
    public $error;

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
     * @return GetResponse
     */
    public static function fromArray(array $data, int $status)
    {
        $response = new self();
        $response->status = $status;
        $response->success = (bool) $data['success'];
        $response->error = isset($data['error']) ? Error::fromArray($data['error']) : null;
        if (!empty($data['data'])) {
            $response->data = [];
            foreach ($data['data'] as $item) {
                $response->data[] = Transaction::fromArray($item);
            }
        }

        return $response;
    }
}
