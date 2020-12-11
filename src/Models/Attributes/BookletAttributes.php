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
class BookletAttributes implements XmlSerializable, \JsonSerializable
{
    /**
     * @var string
     */
    private $cover;

    /**
     * @var string
     */
    private $binding;

    /**
     * @var int
     */
    private $pages;

    /**
     * @var int
     */
    private $tabbing;

    /**
     * @var int
     */
    private $shrinkWrapping;

    /**
     * @var string
     */
    private $holeMaking;

    /**
     * @var string
     */
    private $coverSubstrate;

    /**
     * @param string $cover
     * @return BookletAttributes
     */
    public function setCover($cover) 
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * @return string
     */
    public function getCover() 
    {
        return $this->cover;
    }

    /**
     * @param string $binding
     * @return BookletAttributes
     */
    public function setBinding($binding) 
    {
        $this->binding = $binding;

        return $this;
    }

    /**
     * @return string
     */
    public function getBinding() 
    {
        return $this->binding;
    }

    /**
     * @param int $pages
     * @return BookletAttributes
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
     * @param int $tabbing
     * @return BookletAttributes
     */
    public function setTabbing($tabbing) 
    {
        $this->tabbing = $tabbing;

        return $this;
    }

    /**
     * @return int
     */
    public function getTabbing()
    {
        return $this->tabbing;
    }

    /**
     * @param string $holeMaking
     * @return BookletAttributes
     */
    public function setHoleMaking($holeMaking)
    {
        $this->holeMaking = $holeMaking;

        return $this;
    }

    /**
     * @return string
     */
    public function getHoleMaking()
    {
        return $this->holeMaking;
    }

    /**
     * @param string $coverSubstrate
     * @return BookletAttributes
     */
    public function setCoverSubstrate($coverSubstrate)
    {
        $this->coverSubstrate = $coverSubstrate;

        return $this;
    }

    /**
     * @return string
     */
    public function getCoverSubstrate()
    {
        return $this->coverSubstrate;
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

        $writer->startElement('booklet_attributes');

        if (isset($this->cover)) {
            $writer->writeElement('cover', $this->cover);
        }

        if (isset($this->binding)) {
            $writer->writeElement('binding', $this->binding);
        }

        if (isset($this->pages)) {
            $writer->writeElement('pages', $this->pages);
        }

        if (isset($this->tabbing)) {
            $writer->writeElement('tabbing', $this->tabbing);
        }

        if (isset($this->holeMaking)) {
            $writer->writeElement('hole_making', $this->holeMaking);
        }

        if (isset($this->coverSubstrate)) {
            $writer->writeElement('cover_substrate', $this->coverSubstrate);
        }
        
        $writer->endElement();

        return $writer->outputMemory();
    }

    /**
     * @return array[]
     */
    public function jsonSerialize()
    {
        return [
            'bookletAttribute' => [
                'cover' => $this->cover,
                'binding' => $this->binding,
                'pageCount' => $this->pages,
                'tabbing' => $this->tabbing,
                'holeMaking' => $this->holeMaking,
                'coverSubstrate' => $this->coverSubstrate
            ]
        ];
    }
}
