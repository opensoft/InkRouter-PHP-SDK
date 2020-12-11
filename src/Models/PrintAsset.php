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

use XMLWriter;

/**
 * @author Vladimir Prudilin <vladimir.prudilin@opensoftdev.ru>
 */
class PrintAsset implements XmlSerializable, \JsonSerializable
{
    /**
     * @var integer x coordinate in inches
     */
    private $positionX;

    /**
     * @var integer y coordinate in inches
     */
    private $positionY;

    /**
     * @var integer width in inches
     */
    private $width;

    /**
     * @var integer height in inches
     */
    private $height;

    /**
     * @var string
     */
    private $type;

    /**
     * @var integer rotation in degrees, f.e. 0 or -90
     */
    private $rotation;

    /**
     * @return integer
     */
    public function getPositionX()
    {
        return $this->positionX;
    }

    /**
     * @param integer $positionX
     * @return PrintAsset
     */
    public function setPositionX($positionX)
    {
        $this->positionX = $positionX;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPositionY()
    {
        return $this->positionY;
    }

    /**
     * @param integer $positionY
     * @return PrintAsset
     */
    public function setPositionY($positionY)
    {
        $this->positionY = $positionY;

        return $this;
    }

    /**
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param integer $width
     * @return PrintAsset
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param integer $height
     * @return PrintAsset
     */
    public function setHeight($height)
    {
        $this->height = $height;

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
     * @param string $type
     * @return PrintAsset
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return integer
     */
    public function getRotation()
    {
        return $this->rotation;
    }

    /**
     * @param integer $rotation
     * @return PrintAsset
     */
    public function setRotation($rotation)
    {
        $this->rotation = (int) $rotation;

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

        $writer->startElement('print_asset');

        if (isset($this->positionX)) {
            $writer->writeElement('position_x', $this->positionX);
        }

        if (isset($this->positionY)) {
            $writer->writeElement('position_y', $this->positionY);
        }

        if (isset($this->width)) {
            $writer->writeElement('width', $this->width);
        }

        if (isset($this->height)) {
            $writer->writeElement('height', $this->height);
        }

        if (isset($this->type)) {
            $writer->writeElement('type', $this->type);
        }

        if (isset($this->rotation)) {
            $writer->writeElement('rotation', $this->rotation);
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
            'positionX' => $this->positionX,
            'positionY' => $this->positionY,
            'width' => $this->width,
            'height' => $this->height,
            'type' => $this->type,
            'rotation' => $this->rotation
        ];
    }
}
