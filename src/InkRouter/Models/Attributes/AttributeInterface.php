<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Opensoft\InkRouterSdk\Models\Attributes;

/**
 * @author Kirill Gusakov
 */
interface AttributeInterface
{
    /**
     * @abstract
     * @param bool $root
     * @return mixed
     */
    public function pack($root = false);
}
