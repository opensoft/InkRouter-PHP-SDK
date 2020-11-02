<?php

/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace InkRouter\Client;

use InkRouter\Exceptions\Exception;
use InkRouter\Models\OrderInfo;

/**
 * @deprecated since v2
 */
interface ClientInterface
{
    /**
     * @param int $printCustomerOuterOrderId
     * @param OrderInfo $orderInfo
     * @return mixed
     * @throws Exception
     *@deprecated since v2
     */
    public function createOrder($printCustomerOuterOrderId, OrderInfo $orderInfo);

    /**
     * @deprecated since v2
     * @param int $printProviderOrderId
     * @param int $printCustomerOuterOrderId
     * @param OrderInfo $orderInfo
     * @return mixed
     * @throws Exception
     */
    public function updateOrder($printProviderOrderId, $printCustomerOuterOrderId, OrderInfo $orderInfo);

    /**
     * @deprecated since v2
     * @param int $printProviderOrderId
     * @param int $printCustomerOuterOrderId
     * @return mixed
     * @throws Exception
     */
    public function placeOnHold($printProviderOrderId, $printCustomerOuterOrderId);

    /**
     * @deprecated since v2
     * @param int $printProviderOrderId
     * @param int $printCustomerOuterOrderId
     * @return mixed
     * @throws Exception
     */
    public function removeHold($printProviderOrderId, $printCustomerOuterOrderId);

    /**
     * @deprecated since v2
     * @param int $printProviderOrderId
     * @param int $printCustomerOuterOrderId
     * @return mixed
     * @throws Exception
     */
    public function cancelOrder($printProviderOrderId, $printCustomerOuterOrderId);
}
