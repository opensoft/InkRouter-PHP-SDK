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
 * @author James Taylor <james.taylor@opensoftdev.com>
 */
class NotepadsAttributes implements XmlSerializable, \JsonSerializable
{
    /**
     * @var int
     */
    private $pages;

    /**
     * @param int $pages
     * @return NotepadsAttributes
     */
    public function setPages($pages)
    {
        $this->pages = $pages;

        return $this;
    }

    /**
     * @return int
     */
    public function getPages()
    {
        return $this->pages;
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

        $writer->startElement('notepads_attributes');

        if (isset($this->pages)) {
            $writer->writeElement('pages', $this->pages);
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
            'notepadsAttribute' => [
                'pageCount' => (int)$this->pages
            ]
        ];
    }
}
