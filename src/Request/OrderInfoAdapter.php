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

use InkRouter\Models\OrderInfo as ModelOrderInfo;

/**
 * @author Dmitry Petrov <dmitry.petrov@opensoftdev.com>
 */
class OrderInfoAdapter
{
    public static function adopt(ModelOrderInfo $modelOrderInfo)
    {
        $orderInfo = new OrderInfo();
        $orderInfo->headerInfo = $modelOrderInfo->getHeaderInfo();
        $orderInfo->poInfo = $modelOrderInfo->getPoInfo();
        $orderInfo->order = $modelOrderInfo->getOrder();
        $orderInfo->printCustomerId = $modelOrderInfo->getPrintCustomerId();

        return $orderInfo;
    }
}
