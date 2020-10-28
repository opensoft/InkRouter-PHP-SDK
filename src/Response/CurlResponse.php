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
class CurlResponse
{
    /**
     * @var array
     */
    private $message;

    /**
     * @var int
     */
    private $status;

    /**
     * @param array $message
     * @param int $status
     */
    public function __construct(array $message, int $status)
    {
        $this->message = $message;
        $this->status = $status;
    }

    /**
     * @return array
     */
    public function getMessage(): array
    {
        return $this->message;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }
}
