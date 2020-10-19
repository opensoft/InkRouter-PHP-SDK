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
class FoldingAttributes implements AttributeInterface
{
    /**
     * @var string
     */
    private $foldingType;

    /**
     * @var bool
     */
    private $flipTopPanel;

    /**
     * @var bool
     * @deprecated
     */
    private $insideOut;

    /**
     * @param bool $flipTopPanel
     * @return FoldingAttributes
     */
    public function setFlipTopPanel($flipTopPanel)
    {
        $this->flipTopPanel = $flipTopPanel;

        return $this;
    }

    /**
     * @return bool
     */
    public function getFlipTopPanel()
    {
        return $this->flipTopPanel;
    }

    /**
     * @param string $foldingType
     * @return FoldingAttributes
     */
    public function setFoldingType($foldingType)
    {
        $this->foldingType = $foldingType;

        return $this;
    }

    /**
     * @return string
     */
    public function getFoldingType()
    {
        return $this->foldingType;
    }

    /**
     * @param bool $insideOut
     * @return FoldingAttributes
     * @deprecated
     */
    public function setInsideOut($insideOut)
    {
        $this->insideOut = $insideOut;

        return $this;
    }

    /**
     * @return bool
     * @deprecated
     */
    public function getInsideOut()
    {
        return $this->insideOut;
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

        $writer->startElement('folding_attributes');

        if (isset($this->foldingType)) {
            $writer->writeElement('folding_type', $this->foldingType);
        }

        if (isset($this->flipTopPanel)) {
            $writer->writeElement('flip_top_panel', ($this->flipTopPanel) ? 'true' : 'false');
        }

        if (isset($this->insideOut)) {
            $writer->writeElement('inside_out', ($this->insideOut) ? 'true' : 'false');
        }
        $writer->endElement();

        return $writer->outputMemory();
    }
}
