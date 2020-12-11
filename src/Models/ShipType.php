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

use InvalidArgumentException;
use XMLWriter;

/**
 * Contains information about shipping
 *
 * @author Kirill Gusakov
 */
class ShipType implements XmlSerializable, \JsonSerializable
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
     * @var string|null
     */
    private $suggestedShipMethod;

    /**
     * @var string|null
     */
    private $suggestedShipService;

    /**
     * @var bool|null
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
     * @return ShipType
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
     * @return ShipType
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
            throw new InvalidArgumentException('The specified value for signature is not valid');
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
     * @return string|null
     */
    public function getSuggestedShipMethod(): ?string
    {
        return $this->suggestedShipMethod;
    }

    /**
     * @param string|null $suggestedShipMethod
     * @return ShipType
     */
    public function setSuggestedShipMethod(?string $suggestedShipMethod): ShipType
    {
        $this->suggestedShipMethod = $suggestedShipMethod;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSuggestedShipService(): ?string
    {
        return $this->suggestedShipService;
    }

    /**
     * @param string|null $suggestedShipService
     * @return ShipType
     */
    public function setSuggestedShipService(?string $suggestedShipService): ShipType
    {
        $this->suggestedShipService = $suggestedShipService;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCashOnDelivery(): ?bool
    {
        return $this->cashOnDelivery;
    }

    /**
     * @param bool|null $cashOnDelivery
     * @return ShipType
     */
    public function setCashOnDelivery(?bool $cashOnDelivery): ShipType
    {
        $this->cashOnDelivery = $cashOnDelivery;

        return $this;
    }

    /**
     * @return array
     */
    public function getValidSignatures()
    {
        return array(ShipType::SIGNATURE_REQUIRED, ShipType::SIGNATURE_REQUIRED_ADULT);
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
        
        $writer->endElement();

        return $writer->outputMemory();
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'signature' => $this->signature,
            'shipMethod' => $this->method,
            'shipService' => $this->serviceLevel,
            'suggestedShipMethod' => $this->suggestedShipMethod,
            'suggestedShipService' => $this->suggestedShipService,
            'cashOnDelivery' => $this->cashOnDelivery
        ];
    }
}
