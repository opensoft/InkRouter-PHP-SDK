<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Opensoft\InkRouterSdk\Exceptions;

use \RuntimeException;

/**
 * Raised when InkRouter web-service is not available or has incorrect wsdl
 *
 * @author Kirill Gusakov
 */
class InkRouterNotAvailableException extends RuntimeException implements Exception
{
    
}
