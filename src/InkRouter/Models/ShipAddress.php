<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Opensoft\InkRouterSdk\Models;

use \XMLWriter;

/**
 * Contains information about shipping address
 *
 * @author Kirill Gusakov
 */
class ShipAddress
{
    /**
     * @var string
     */
    private $companyName;

    /**
     * A name of the person who need to be informed when the order is delivered.
     *
     * @var string
     */
    private $attention;

    /**
     * Street of the shipping address
     *
     * @var string
     */
    private $streetAddress;

    /**
     * City of the shipping address
     *
     * @var string
     */
    private $city;

    /**
     * State of the shipping address
     *
     * @var string
     */
    private $state;

    /**
     * Zip code of the shipping address
     *
     * @var string
     */
    private $zip;

    /**
     * Country of the shipping address
     *
     * @var string
     */
    private $country;

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
        
        if (isset($this->streetAddress)) {
            $writer->writeElement('street_address', $this->streetAddress);
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
}
