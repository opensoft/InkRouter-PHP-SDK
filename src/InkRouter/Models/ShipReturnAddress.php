<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

/**
 * Contains information about the return shipping address
 *
 * @author Richard Fullmer <richard.fullmer@opensoftdev.com>
 */
class InkRouter_Models_ShipReturnAddress
{
    /**
     * @var string
     */
    private $personName;

    /**
     * @var string
     */
    private $companyName;

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @var string
     */
    private $streetAddress;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $zip;

    /**
     * @var string
     */
    private $country;

    /**
     * @param string $city
     * @return InkRouter_Models_ShipReturnAddress
     */
    public function setCity($city)
    {
        $this->city = $city;
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
     * @param string $state
     * @return InkRouter_Models_ShipReturnAddress
     */
    public function setState($state)
    {
        $this->state = $state;
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
     * @param string $streetAddress
     * @return InkRouter_Models_ShipReturnAddress
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;
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
     * @param string $zip
     * @return InkRouter_Models_ShipReturnAddress
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
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
     * @param string $companyName
     * @return InkRouter_Models_ShipReturnAddress
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param string $country
     * @return InkRouter_Models_ShipReturnAddress
     */
    public function setCountry($country)
    {
        $this->country = $country;

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
     * @param string $personName
     * @return InkRouter_Models_ShipReturnAddress
     */
    public function setPersonName($personName)
    {
        $this->personName = $personName;

        return $this;
    }

    /**
     * @return string
     */
    public function getPersonName()
    {
        return $this->personName;
    }

    /**
     * @param string $phoneNumber
     * @return InkRouter_Models_ShipReturnAddress
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
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

        $writer->startElement('ship_return_address');

        if (isset($this->personName)) {
            $writer->writeElement('person_name', $this->personName);
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
