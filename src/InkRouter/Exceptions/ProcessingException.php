<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Opensoft\InkRouterSdk\Exceptions;

use \RuntimeException;

/**
 * Raised when InkRouter can not process order because of any reasons
 *
 * @author Kirill Gusakov
 */
class ProcessingException extends RuntimeException implements Exception
{

}
