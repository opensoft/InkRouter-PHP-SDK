<?php

/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace InkRouter\Response;

use DOMDocument;

/**
 * Class for parsing response from InkRouter to http service
 *
 * @author Kirill Gusakov
 * @deprecated
 */
class Response
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
     * @return Response
     */
    public static function fromPack($pack)
    {
        $xml = new DOMDocument();
        $xml->loadXML($pack);
        $response = new self();
        foreach ($xml->getElementsByTagName('client_update') as $update) {
            $updateObj = new Update();
            foreach ($update->childNodes as $property) {
                $nodeValue = $property->nodeValue;
                if ($property->attributes && $property->attributes->length > 0) {
                    $nil = $property->attributes->getNamedItem('nil');
                    if ($nil->value === 'true') {
                        $nodeValue = null;
                    }
                }
                switch ($property->nodeName) {
                    case 'update_id':
                        $updateObj->setId($nodeValue);
                        break;
                    case 'update_type':
                        $updateObj->setType($nodeValue);
                        break;
                    case 'quantity':
                        $updateObj->setQuantity($nodeValue);
                        break;
                    case 'order_item_id':
                        $updateObj->setOrderItemId($nodeValue);
                        break;
                    case 'comment':
                        $updateObj->setComment($nodeValue);
                        break;
                    case 'replyUrl':
                        $updateObj->setReplyUrl($nodeValue);
                        break;
                    case 'timestamp':
                        $updateObj->setTimestamp($nodeValue);
                        break;
                    case 'print_customer_invoice':
                        $updateObj->setPrintCustomerInvoice($nodeValue);
                        break;
                    case 'misc':
                        $updateObj->setMisc($nodeValue);
                        break;
                    case 'tracking_number':
                        $updateObj->setTrackingNumber($nodeValue);
                        break;
                    case 'weight':
                        $updateObj->setWeight($nodeValue);
                        break;
                    case 'cost':
                        $updateObj->setCost($nodeValue);
                        break;
                    case 'print_provider_invoice':
                        $updateObj->setPrintProviderInvoice($nodeValue);
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
     * @param Update $update
     * @return Response
     */
    private function addUpdate($update)
    {
        $this->updates[] = $update;

        return $this;
    }
}
