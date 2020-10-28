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

use InkRouter\Models\HeaderInfo;
use InkRouter\Models\Order;
use InkRouter\Models\PoInfo;

/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.com>
 */
class OrderInfo implements \JsonSerializable
{
    /**
     * @var HeaderInfo
     */
    public $headerInfo;

    /**
     * @var PoInfo
     */
    public $poInfo;

    /**
     * @var Order
     */
    public $order;

    /**
     * @var string
     */
    public $printCustomerId;

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'poInfo' => $this->poInfo,
            'headerInfo' => $this->headerInfo,
            'order' => $this->order,
            'printCustomerId' => $this->printCustomerId
        ];
    }
}
