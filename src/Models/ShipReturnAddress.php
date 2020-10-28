<?php

/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace InkRouter\Models;

use XMLWriter;

/**
 * Contains information about the return shipping address
 *
 * @deprecated since API v2, use ResellerShipAddress
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 */
class ShipReturnAddress extends ResellerShipAddress
{
    /**
     * @param bool $root
     * @return string
     */
    public function pack($root = false)
    {
        $writer = new XMLWriter();
        $writer->openMemory();
        if ($root) {
            $writer->startDocument();
        }

        $writer->startElement('ship_return_address');

        if (isset($this->personName)) {
            $writer->writeElement('person_name', $this->personName);
        }
        if (isset($this->attention)) {
            $writer->writeElement('attention', $this->attention);
        }
        if (!isset($this->attention) && isset($this->personName)) {
            $writer->writeElement('attention', $this->personName);
        }

        if (isset($this->companyName)) {
            $writer->writeElement('company_name', $this->companyName);
        }

        if (isset($this->phoneNumber)) {
            $writer->writeElement('phone_number', $this->phoneNumber);
        }

        if (isset($this->streetAddress)) {
            $writer->writeElement('street_address', $this->streetAddress);
        }

        if (isset($this->street1)) {
            $writer->writeElement('street_address1', $this->street1);
        }

        if (isset($this->street2)) {
            $writer->writeElement('street_address2', $this->street2);
        }
        
        if (isset($this->city)) {
            $writer->writeElement('city', $this->city);
        }
        
        if (isset($this->state)) {
            $writer->writeElement('state', $this->state);
        }
        
        if (isset($this->zip)) {
            $writer->writeElement('zip', $this->zip);
        }

        if (isset($this->country)) {
            $writer->writeElement('country', $this->country);
        }
        
        $writer->endElement();

        return $writer->outputMemory();
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return array_merge(
            parent::jsonSerialize(),
            [
                'personName' => $this->personName,
                'supportEmail' => $this->supportEmail
            ]
        );
    }
}
