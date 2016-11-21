<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

/**
 * Contains information about shipping
 *
 * @author Kirill Gusakov
 */
class InkRouter_Models_ShipType
{
    const SIGNATURE_REQUIRED = "required";
    const SIGNATURE_REQUIRED_ADULT = "required-adult";

    /**
     * Defines what shipping vendor is used: UPS or USPS
     *
     * @var string
     */
    private $method;

    /**
     * Shipping method. A list of supported shipping methods can be found in the InkRouter docs
     *
     * @var string
     */
    private $serviceLevel;

    /**
     * Signature. Specifies if signature is required upon delivery.
     * Valid values are :
     * required
     * required-adult
     *
     * @var string
     */
    private $signature;

    /**
     * @var bool
     */
    private $cashOnDelivery;

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     * @return InkRouter_Models_ShipType
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return string
     */
    public function getServiceLevel()
    {
        return $this->serviceLevel;
    }

    /**
     * @param string $serviceLevel
     * @return InkRouter_Models_ShipType
     */
    public function setServiceLevel($serviceLevel)
    {
        $this->serviceLevel = $serviceLevel;
        return $this;
    }

    /**
     * @param string $signature
     */
    public function setSignature($signature)
    {
        $validSignatures = $this->getValidSignatures();

        $result = array_search($signature, $validSignatures);
        if (false === $result) {
            throw new \InvalidArgumentException('The specified value for signature is not valid');
        }

        $this->signature = $signature;
    }

    /**
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @return array
     */
    public function getValidSignatures()
    {
        return array(InkRouter_Models_ShipType::SIGNATURE_REQUIRED, InkRouter_Models_ShipType::SIGNATURE_REQUIRED_ADULT);
    }

    /**
     * @return bool
     */
    public function getCashOnDelivery()
    {
        return $this->cashOnDelivery;
    }

    /**
     * @param bool $cashOnDelivery
     * @return InkRouter_Models_ShipType
     */
    public function setCashOnDelivery($cashOnDelivery)
    {
        $this->cashOnDelivery = $cashOnDelivery;
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

        $writer->startElement('ship_type');

        if (isset($this->method)) {
            $writer->writeElement('method', $this->method);
        }
        
        if (isset($this->serviceLevel)) {
            $writer->writeElement('service_level', $this->serviceLevel);
        }

        if (isset($this->signature)) {
            $writer->writeElement('signature', $this->signature);
        }

        if (isset($this->cashOnDelivery)) {
            $writer->writeElement('cash_on_delivery', $this->cashOnDelivery ? 'true' : 'false');
        }

        $writer->endElement();

        return $writer->outputMemory();
    }
}
