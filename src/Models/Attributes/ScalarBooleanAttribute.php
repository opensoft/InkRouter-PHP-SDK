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
 * @deprecated since API v2
 * @author Kirill Gusakov
 */
class ScalarBooleanAttribute extends ScalarStringAttribute
{
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

        $writer->startElement('scalar_boolean_attribute');

        if (isset($this->type)) {
            $writer->writeElement('type', $this->type);
        }

        if (isset($this->value)) {
            $writer->writeElement('value', ($this->value) ? 'true' : 'false');
        }

        $writer->endElement();

        return $writer->outputMemory();
    }
}
