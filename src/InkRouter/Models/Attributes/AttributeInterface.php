<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

/**
 * @author Kirill Gusakov
 */
interface InkRouter_Models_Attributes_AttributeInterface
{
    /**
     * @abstract
     * @param bool $root
     * @return mixed
     */
    public function pack($root = false);
}
