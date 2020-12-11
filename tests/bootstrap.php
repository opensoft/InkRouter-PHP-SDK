<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

function autoloadSDK($class)
{
    if (0 === strpos($class, 'InkRouter_')) {
        $path = dirname(__FILE__) . '/../src/'.implode('/', explode('_', $class)) . '.php';
        require_once $path;

        return true;
    }
}

spl_autoload_register('autoloadSDK');
