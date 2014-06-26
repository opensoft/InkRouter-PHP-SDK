<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

/**
 * Class for parsing response from InkRouter to http service
 *
 * @author Kirill Gusakov
 */
class InkRouter_Response_Response
{

    /**
     * Contain information about one or more updates
     *
     * @var array
     */
    private $updates = array();

    /**
     * @static
     * @param string $pack with xml from InkRouter
     * @return InkRouter_Response_Response
     */
    public static function fromPack($pack)
    {
        $xml = new DOMDocument();
        $xml->loadXML($pack);
        $response = new self();
        foreach ($xml->getElementsByTagName('client_update') as $update) {
            $updateObj = new InkRouter_Response_Update();
            foreach ($update->childNodes as $property) {
                switch ($property->nodeName) {
                    case 'update_id':
                        $updateObj->setId($property->nodeValue);
                        break;
                    case 'update_type':
                        $updateObj->setType($property->nodeValue);
                        break;
                    case 'quantity':
                        $updateObj->setQuantity($property->nodeValue);
                        break;
                    case 'order_item_id':
                        $updateObj->setOrderItemId($property->nodeValue);
                        break;
                    case 'comment':
                        $updateObj->setComment($property->nodeValue);
                        break;
                    case 'replyUrl':
                        $updateObj->setReplyUrl($property->nodeValue);
                        break;
                    case 'timestamp':
                        $updateObj->setTimestamp($property->nodeValue);
                        break;
                    case 'print_customer_invoice':
                        $updateObj->setPrintCustomerInvoice($property->nodeValue);
                        break;
                    case 'misc':
                        $updateObj->setMisc($property->nodeValue);
                        break;
                    case 'tracking_number':
                        $updateObj->setTrackingNumber($property->nodeValue);
                        break;
                    case 'weight':
                        $updateObj->setWeight($property->nodeValue);
                        break;
                    case 'cost':
                        $updateObj->setCost($property->nodeValue);
                        break;
                    case 'print_provider_invoice':
                        $updateObj->setPrintProviderInvoice($property->nodeValue);
                        break;
                }
            }
            $response->addUpdate($updateObj);
        }

        return $response;
    }

    /**
     * @return array
     */
    public function getUpdates()
    {
        return $this->updates;
    }

    /**
     * @param InkRouter_Response_Update $update
     * @return InkRouter_Response_Response
     */
    private function addUpdate($update)
    {
        $this->updates[] = $update;
        return $this;
    }
}
