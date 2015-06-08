<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2013 Opensoft (http://opensoftdev.com)
 */

/**
 * @author Alexey Nikolaev <alexey.nikolaev@opensoftdev.ru>
 */
class InkRouter_Utils_OrderProcessor
{
    /**
     * @param InkRouter_Models_Order $order
     */
    public static function transform(InkRouter_Models_Order $order)
    {
        $orderItems = $order->getOrderItems();
        foreach ($orderItems as &$orderItem) {
            /**@var InkRouter_Models_OrderItem $orderItem */
            $newOrderItem = null;
            $mailingAttributes = null;
            $attributes = array();
            foreach ($orderItem->getAttributes() as $attribute) {
                if ($attribute instanceof InkRouter_Models_Attributes_ScalarStringAttribute) {
                    /** InkRouter_Models_Attributes_ScalarStringAttribute $attribute */
                    if ($attribute->getType() == 'ENVELOPE_TYPE') {
                        $newOrderItem = new InkRouter_Models_OrderItem();
                        $newOrderItem->setPrintGroupId($orderItem->getPrintGroupId()."E");
                        $newOrderItem->setProductType(self::getEnvelopeType($orderItem->getProductType()));
                        $newOrderItem->setQuantity($orderItem->getQuantity());
                        $newOrderItem->setCost(0.0);
                        $envelopeAttribute = new InkRouter_Models_Attributes_ScalarStringAttribute();
                        $envelopeAttribute->setType('MEDIA_COLOR')
                            ->setValue($attribute->getValue());
                        $newOrderItem->addAttributes($envelopeAttribute);
                    } else {
                        $attributes[] = $attribute;
                    }
                } else if ($attribute instanceof InkRouter_Models_Attributes_MailingAttributes) {
                    /**@var InkRouter_Models_Attributes_MailingAttributes $attribute */
                    $mailingAttributes = new InkRouter_Models_Attributes_MailingAttributes();
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
                    $idAttribute = new InkRouter_Models_Attributes_ScalarStringAttribute();
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
            "5.5x8.5 stationery" => "A9 blank envelopes"
        );
        if (array_key_exists($productType, $envelopeTypes)) {
            return $envelopeTypes[$productType];
        }

        return '';
    }
}
