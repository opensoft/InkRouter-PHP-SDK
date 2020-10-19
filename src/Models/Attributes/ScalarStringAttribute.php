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

use XMLWriter;

/**
 * @author Kirill Gusakov
 */
class ScalarStringAttribute implements AttributeInterface
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $value;

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
            $writer->writeElement('value', $this->value);
        }
        
        $writer->endElement();

        return $writer->outputMemory();
    }
}
