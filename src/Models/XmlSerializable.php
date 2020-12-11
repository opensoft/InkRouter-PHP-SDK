<?php

/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace InkRouter\Models;

/**
 * @author Kirill Gusakov
 */
interface XmlSerializable
{
    /**
     * @abstract
     * @param bool $root
     * @return mixed
     */
    public function pack($root = false);
}
