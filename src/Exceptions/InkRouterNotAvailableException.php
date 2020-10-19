<?php

/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace InkRouter\Exceptions;

use RuntimeException;

/**
 * Raised when InkRouter web-service is not available or has incorrect wsdl
 *
 * @author Kirill Gusakov
 */
class InkRouterNotAvailableException extends RuntimeException implements Exception
{
}
