<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2023 Opensoft (http://opensoftdev.com)
 */

/**
 * Contains information about a order item pricing
 *
 * @author Scott Driscoll
 */
class InkRouter_Models_Price
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var float
     */
    private $value;

    /**
     * @param string $type
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param float $value
     * @return self
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
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

        $writer->startElement('price');
        if (isset($this->type)) {
            $writer->writeElement('type', $this->type);
        }

        if (isset($this->value)) {
            $writer->writeElement('value', $this->value);
        }

        $writer->endElement();

        return $writer->outputMemory();
    }
}
