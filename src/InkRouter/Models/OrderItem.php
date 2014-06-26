<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

/**
 * Contains information about a specific order item
 *
 * @author Kirill Gusakov
 */
class InkRouter_Models_OrderItem
{

    /**
     * @var string
     */
    private $printGroupId;

    /**
     * @var string
     */
    private $productType;

    /**
     * @var string
     */
    private $paperType;

    /**
     * @var int
     */
    private $quantity;

    /**
     * @var string
     */
    private $regionSize;

    /**
     * @var float
     */
    private $cost;

    /**
     * @var InkRouter_Models_Attributes_AttributeInterface[]
     */
    private $attributes = array();

    /**
     * @var InkRouter_Models_Side[]
     */
    private $sides = array();

    /**
     * @var string
     */
    private $inspection;

    /**
     * @var string
     */
    private $generatedId;

    /**
     * @var int
     */
    private $qualityPriority;

    /**
     * @var int
     */
    private $slaPriority;

    /**
     * @return string
     */
    public function getPrintGroupId()
    {
        return $this->printGroupId;
    }

    /**
     * @param string $printGroupId
     * @return InkRouter_Models_OrderItem
     */
    public function setPrintGroupId($printGroupId)
    {
        $this->printGroupId = $printGroupId;

        return $this;
    }

    /**
     * @return string
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * @param string $productType
     * @return InkRouter_Models_OrderItem
     */
    public function setProductType($productType)
    {
        $this->productType = $productType;

        return $this;
    }

    /**
     * @return string
     */
    public function getPaperType()
    {
        return $this->paperType;
    }

    /**
     * @param string $paperType
     * @return InkRouter_Models_OrderItem
     */
    public function setPaperType($paperType)
    {
        $this->paperType = $paperType;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return InkRouter_Models_OrderItem
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return string
     */
    public function getRegionSize()
    {
        return $this->regionSize;
    }

    /**
     * @param string $regionSize
     * @return InkRouter_Models_OrderItem
     */
    public function setRegionSize($regionSize)
    {
        $this->regionSize = $regionSize;

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
     * @param float $cost
     * @return InkRouter_Models_OrderItem
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes array of InkRouter_Models_Attributes_AttributeInterface
     * @return InkRouter_Models_OrderItem
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    public function addAttributes(InkRouter_Models_Attributes_AttributeInterface $attribute)
    {
        $this->attributes[] = $attribute;

        return $this;
    }

    /**
     * @return array
     */
    public function getSides()
    {
        return $this->sides;
    }

    /**
     * @param InkRouter_Models_Side[] $sides
     * @return InkRouter_Models_OrderItem
     */
    public function setSides(array $sides)
    {
        $this->sides = $sides;

        return $this;
    }

    /**
     * @param InkRouter_Models_Side $side
     * @return InkRouter_Models_OrderItem
     */
    public function addSide($side)
    {
        $this->sides[] = $side;

        return $this;
    }

    /**
     * @param string $inspection
     */
    public function setInspection($inspection)
    {
        $this->inspection = $inspection;
    }

    /**
     * @return string
     */
    public function getInspection()
    {
        return $this->inspection;
    }

    /**
     * @return string
     */
    public function getGeneratedId()
    {
        return $this->generatedId;
    }

    /**
     * @param string $generatedId
     * @return InkRouter_Models_OrderItem
     */
    public function setGeneratedId($generatedId)
    {
        $this->generatedId = $generatedId;

        return $this;
    }

    /**
     * @return int
     */
    public function getQualityPriority()
    {
        return $this->qualityPriority;
    }

    /**
     * @param int $qualityPriority
     * @return InkRouter_Models_OrderItem
     * @throws \InvalidArgumentException if the qualityPriority is not between 1 and 10
     */
    public function setQualityPriority($qualityPriority)
    {
        if ($qualityPriority < 1 || $qualityPriority > 10) {
            throw new \InvalidArgumentException('The specified value for qualityPriority is not valid');
        }
        $this->qualityPriority = $qualityPriority;

        return $this;
    }

    /**
     * @return int
     */
    public function getSlaPriority()
    {
        return $this->slaPriority;
    }

    /**
     * @param int $slaPriority
     * @return InkRouter_Models_OrderItem
     * @throws \InvalidArgumentException if the slaPriority is not between 1 and 10
     */
    public function setSlaPriority($slaPriority)
    {
        if ($slaPriority < 1 || $slaPriority > 10) {
            throw new \InvalidArgumentException('The specified value for slaPriority is not valid');
        }
        $this->slaPriority = $slaPriority;

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

        $writer->startElement('order_item');

        if (isset($this->printGroupId)) {
            $writer->writeElement('print_group_id', $this->printGroupId);
        }

        if (isset($this->productType)) {
            $writer->writeElement('product_type', $this->productType);
        }

        if (isset($this->inspection)) {
            $writer->writeElement('inspection', $this->inspection);
        }

        if (isset($this->generatedId)) {
            $writer->writeElement('generated_id', $this->generatedId);
        }

        if (isset($this->paperType)) {
            $writer->writeElement('paper_type', $this->paperType);
        }

        if (isset($this->quantity)) {
            $writer->writeElement('quantity', $this->quantity);
        }

        if (isset($this->regionSize)) {
            $writer->writeElement('region_size', $this->regionSize);
        }

        if (isset($this->cost)) {
            $writer->writeElement('cost', $this->cost);
        }

        if (isset($this->qualityPriority)) {
            $writer->writeElement('quality_priority', $this->qualityPriority);
        }

        if (isset($this->slaPriority)) {
            $writer->writeElement('sla_priority', $this->slaPriority);
        }

        $writer->writeRaw($this->packAttributes());
        $writer->startElement('sides');
        foreach ($this->sides as $side) {
            $writer->writeRaw($side->pack());
        }
        $writer->endElement();
        $writer->endElement();

        return $writer->outputMemory();
    }

    private function packAttributes()
    {
        $writer = new XMLWriter();
        $writer->openMemory();
        $writer->startElement('attributes');
        foreach ($this->attributes as $attribute) {
            $writer->writeRaw($attribute->pack());
        }
        $writer->endElement();

        return $writer->outputMemory();
    }
}
