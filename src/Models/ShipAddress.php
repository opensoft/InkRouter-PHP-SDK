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
 * Contains information about shipping address
 *
 * @author Kirill Gusakov
 */
class ShipAddress implements XmlSerializable, \JsonSerializable
{
    /**
     * @var string
     */
    protected $companyName;

    /**
     * A name of the person who need to be informed when the order is delivered.
     *
     * @var string
     */
    protected $attention;

    /**
     * @var string|null
     */
    protected $phoneNumber;

    /**
     * Street of the shipping address
     *
     * @var string
     */
    protected $streetAddress;

    /**
     * @var string|null
     */
    protected $street1;

    /**
     * @var string|null
     */
    protected $street2;

    /**
     * City of the shipping address
     *
     * @var string
     */
    protected $city;

    /**
     * State of the shipping address
     *
     * @var string
     */
    protected $state;

    /**
     * Zip code of the shipping address
     *
     * @var string
     */
    protected $zip;

    /**
     * Country of the shipping address
     *
     * @var string
     */
    protected $country;

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     * @return ShipAddress
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * @return string
     */
    public function getAttention()
    {
        return $this->attention;
    }

    /**
     * @param string $attention
     * @return ShipAddress
     */
    public function setAttention($attention)
    {
        $this->attention = $attention;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * @param string $streetAddress
     * @return ShipAddress
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return ShipAddress
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return ShipAddress
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     * @return ShipAddress
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return ShipAddress
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStreet1(): ?string
    {
        return $this->street1;
    }

    /**
     * @param string|null $street1
     * @return ShipAddress
     */
    public function setStreet1(?string $street1): ShipAddress
    {
        $this->street1 = $street1;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStreet2(): ?string
    {
        return $this->street2;
    }

    /**
     * @param string|null $street2
     * @return ShipAddress
     */
    public function setStreet2(?string $street2): ShipAddress
    {
        $this->street2 = $street2;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string|null $phoneNumber
     * @return ShipAddress
     */
    public function setPhoneNumber(?string $phoneNumber): ShipAddress
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

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

        $writer->startElement('ship_address');

        if (isset($this->companyName)) {
            $writer->writeElement('company_name', $this->companyName);
        }

        if (isset($this->attention)) {
            $writer->writeElement('attention', $this->attention);
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
        return [
            'company' => $this->companyName,
            'attention' => $this->attention,
            'phoneNumber' => $this->phoneNumber,
            'street' => $this->streetAddress,
            'street1' => $this->street1,
            'street2' => $this->street2,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'country' => $this->country
        ];
    }
}
