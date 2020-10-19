<?php

/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace InkRouter\Utils;

use InkRouter\Models\Attributes\MailingAttributes;
use InkRouter\Models\Attributes\ScalarStringAttribute;
use InkRouter\Models\Order;
use InkRouter\Models\OrderItem;

/**
 * @author Alexey Nikolaev <alexey.nikolaev@opensoftdev.ru>
 */
class OrderProcessor
{
    /**
     * @param Order $order
     */
    public static function transform(Order $order)
    {
        $orderItems = $order->getOrderItems();
        foreach ($orderItems as $orderItem) {
            /**@var OrderItem $orderItem */
            $newOrderItem = null;
            $mailingAttributes = null;
            $attributes = array();
            foreach ($orderItem->getAttributes() as $attribute) {
                if ($attribute instanceof ScalarStringAttribute) {
                    /** ScalarStringAttribute $attribute */
                    if ($attribute->getType() == 'ENVELOPE_TYPE') {
                        $newOrderItem = new OrderItem();
                        $newOrderItem->setPrintGroupId($orderItem->getPrintGroupId()."E");
                        $newOrderItem->setProductType(self::getEnvelopeType($orderItem->getProductType()));
                        $newOrderItem->setQuantity($orderItem->getQuantity());
                        $newOrderItem->setCost(0.0);
                        $envelopeAttribute = new ScalarStringAttribute();
                        $envelopeAttribute->setType('MEDIA_COLOR')
                            ->setValue($attribute->getValue());
                        $newOrderItem->addAttributes($envelopeAttribute);
                    } else {
                        $attributes[] = $attribute;
                    }
                } else if ($attribute instanceof MailingAttributes) {
                    /**@var MailingAttributes $attribute */
                    $mailingAttributes = new MailingAttributes();
                    $mailingAttributes->setMailClass($attribute->getMailClass());
                    $mailingAttributes->setShipExtra($attribute->getShipExtra());
                    $attributes[] = $attribute;
                } else {
                    $attributes[] = $attribute;
                }
            }
            $orderItem->setAttributes($attributes);
            if ($newOrderItem != null) {
                if ($mailingAttributes != null) {
                    $newOrderItem->addAttributes($mailingAttributes);
                    $idAttribute = new ScalarStringAttribute();
                    $idAttribute->setType('ENVELOPE_ORDER_ITEM')->setValue($newOrderItem->getPrintGroupId());
                    $orderItem->addAttributes($idAttribute);
                }
                $order->addOrderItem($newOrderItem);
            }
        }
    }

    private static function getEnvelopeType($productType)
    {
        $envelopeTypes =  array(
            "4.25x5.5 postcards" => "A2 blank envelopes",
            "4x6 postcards" => "A4 blank envelopes",
            "5x7 postcards" => "A7 blank envelopes",
            "8.5x5.5 postcards" => "A9 blank envelopes",
            "4x9 rackcards" => "#10 blank envelopes",
            "5.5x8.5 greeting cards" => "A2 blank envelopes",
            "8.5x11 greeting cards" => "A9 blank envelopes",
            "4.25x5.5 stationery" => "A2 blank envelopes",
            "5.5x8.5 stationery" => "A9 blank envelopes",
            "27.5x19 greeting cards" => "jumbo blank envelopes"
        );
        if (array_key_exists($productType, $envelopeTypes)) {
            return $envelopeTypes[$productType];
        }

        return '';
    }
}
