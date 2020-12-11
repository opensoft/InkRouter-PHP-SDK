<?php

/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace InkRouter\Models\Attributes;

use InkRouter\Models\XmlSerializable;
use XMLWriter;

/**
 * @author Kirill Gusakov
 */
class SwagAttributes implements XmlSerializable, \JsonSerializable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $inventoryType;

    /**
     * @var float
     */
    private $cost;

    /**
     * @var string
     */
    private $box;

    /**
     * @var float
     */
    private $shippingWeight;

    /**
     * @param string $box
     * @return SwagAttributes
     */
    public function setBox($box)
    {
        $this->box = $box;

        return $this;
    }

    /**
     * @return string
     */
    public function getBox()
    {
        return $this->box;
    }

    /**
     * @param float $cost
     * @return SwagAttributes
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * @return float
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param string $inventoryType
     * @return SwagAttributes
     */
    public function setInventoryType($inventoryType)
    {
        $this->inventoryType = $inventoryType;

        return $this;
    }

    /**
     * @return string
     */
    public function getInventoryType()
    {
        return $this->inventoryType;
    }

    /**
     * @param string $name
     * @return SwagAttributes
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param float $shippingWeight
     * @return SwagAttributes
     */
    public function setShippingWeight($shippingWeight)
    {
        $this->shippingWeight = $shippingWeight;

        return $this;
    }

    /**
     * @return float
     */
    public function getShippingWeight()
    {
        return $this->shippingWeight;
    }

    public function pack($root = false)
    {
        $writer = new XMLWriter();
        $writer->openMemory();
        if ($root) {
            $writer->startDocument();
        }

        $writer->startElement('swag_attributes');

        if (isset($this->name)) {
            $writer->writeElement('name', $this->name);
        }

        if (isset($this->inventoryType)) {
            $writer->writeElement('inventory_type', $this->inventoryType);
        }

        if (isset($this->cost)) {
            $writer->writeElement('cost', $this->cost);
        }

        if (isset($this->box)) {
            $writer->writeElement('box', $this->box);
        }

        if (isset($this->shippingWeight)) {
            $writer->writeElement('shipping_weight', $this->shippingWeight);
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
            'swagAttribute' => [
                'name' => $this->name,
                'inventoryType' => $this->inventoryType,
                'cost' => (float) $this->cost,
                'box' => $this->box,
                'shippingWeight' => (float) $this->shippingWeight
            ]
        ];
    }

}
