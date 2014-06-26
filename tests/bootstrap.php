<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
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
