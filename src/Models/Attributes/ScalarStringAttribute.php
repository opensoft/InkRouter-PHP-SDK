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
class ScalarStringAttribute implements XmlSerializable, \JsonSerializable
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $value;

    /**
     * @param string $type
     * @return ScalarStringAttribute
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
     * @param string $value
     * @return ScalarStringAttribute
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return string
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

        $writer->startElement('scalar_string_attribute');
        if (isset($this->type)) {
            $writer->writeElement('type', $this->type);
        }

        if (isset($this->value)) {
            $value = $this->value;
            if (is_bool($this->value)) {
                $value = ($this->value) ? 'true' : 'false';
            }
            $writer->writeElement('value', $value);
        }
        
        $writer->endElement();

        return $writer->outputMemory();
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $value = $this->value;
        if (is_bool($this->value)) {
            $value = ($this->value) ? 'true' : 'false';
        }

        return [
            'scalarStringAttribute' => [
                'type' => $this->type,
                'value' => $value
            ]
        ];
    }
}
