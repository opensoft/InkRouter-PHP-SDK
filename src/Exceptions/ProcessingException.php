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
 * Raised when InkRouter can not process order because of any reasons
 *
 * @author Kirill Gusakov
 */
class ProcessingException extends RuntimeException implements Exception
{
}