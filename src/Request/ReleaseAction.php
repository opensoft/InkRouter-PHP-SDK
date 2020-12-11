<?php

/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace InkRouter\Request;

/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.com>
 */
class ReleaseAction extends Action
{
    /**
     * @var string
     */
    protected $status = self::ACTION_RELEASE;
}
