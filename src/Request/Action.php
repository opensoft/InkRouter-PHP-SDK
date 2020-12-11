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
abstract class Action implements \JsonSerializable
{
    public const ACTION_HOLD = 'Hold';
    public const ACTION_RELEASE = 'Release';
    public const ACTION_CANCEL = 'Cancel';

    /**
     * @var string
     */
    protected $status;

    /**
     * @param string $action
     * @return Action
     */
    public static function getInstance(string $action)
    {
        switch ($action) {
            case self::ACTION_HOLD:
                return new HoldAction();
            case self::ACTION_CANCEL:
                return new CancelAction();
            case self::ACTION_RELEASE:
                return new ReleaseAction();
            default:
                throw new \InvalidArgumentException('Unknown Action');
        }
    }

    public function jsonSerialize()
    {
        return [
            'action' => $this->status
        ];
    }
}
