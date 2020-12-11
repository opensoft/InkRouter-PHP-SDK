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

/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.com>
 */
interface HttpClientInterface
{
    /**
     * @param string $url
     * @param string $httpMethod
     * @param array $headers
     * @param string|null $body
     * @return mixed
     */
    public function send(string $url, string $httpMethod, array $headers = [],  string $body = null);
}
