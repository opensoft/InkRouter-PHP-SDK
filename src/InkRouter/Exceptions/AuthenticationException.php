<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Opensoft\InkRouterSdk\Exceptions;

use \RuntimeException;

/**
 * Raised when InkRouter reject received credentials
 *
 * @author Kirill Gusakov
 */
class AuthenticationException extends RuntimeException implements Exception
{

}
