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
class Error
{
    /**
     * @var string|null
     */
    public $message;

    /**
     * @var string|null
     */
    public $code;

    /**
     * @param $data
     * @return Error
     */
    public static function fromArray($data)
    {
        $response = new self();
        $response->message = $data['message'] ?? null;
        $response->code = $data['code'] ?? null;

        return $response;
    }
}
