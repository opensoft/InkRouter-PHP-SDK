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
 * Contains information about one side of product
 *
 * @author Kirill Gusakov
 */
class Side implements XmlSerializable, \JsonSerializable
{
    /**
     * Side number
     *
     * @var int
     */
    private $pageNumber;

    /**
     * URL to a hi-resolution image to be printed on the current side
     *
     * @var string
     */
    private $fileUrl;

    /**
     * Hash of the hi-resolution image
     *
     * @var string
     */
    private $fileHash;

    /**
     * Coating type of the current side. Supported values are FULL, SPOT, NONE
     *
     * @var string
     */
    private $coating;

    /**
     * Orientation of the page: Landscape/Portrait
     *
     * @var string
     */
    private $orientation;

    /**
     * @var string
     */
    private $spotUvFileUrl;

    /**
     * @var string
     */
    private $spotUvFileHash;

    /**
     * @var string
     */
    private $laminating;

    /**
     * @var PrintAsset[]
     */
    private $printAssets;

    /**
     * @var string
     */
    private $variableUvFileUrl;

    /**
     * @var string
     */
    private $variableUvFileHash;

    /**
     * @var string
     */
    private $foilFileUrl;

    /**
     * @var string
     */
    private $foilFileHash;

    /**
     * @var string
     */
    private $foilColor;

    /**
     * @var string|null
     */
    private $opaqueWhiteFileUrl;

    /**
     * @var string|null
     */
    private $opaqueWhiteFileHash;

    /**
     * @return string
     */
    public function getLaminating()
    {
        return $this->laminating;
    }

    /**
     * @param string $laminate
     * @return Side
     */
    public function setLaminating($laminate)
    {
        $this->laminating = $laminate;

        return $this;
    }

    /**
     * @return int
     */
    public function getPageNumber()
    {
        return $this->pageNumber;
    }

    /**
     * @param int $pageNumber
     * @return Side
     */
    public function setPageNumber($pageNumber)
    {
        $this->pageNumber = $pageNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getFileUrl()
    {
        return $this->fileUrl;
    }

    /**
     * @param string $fileUrl
     * @return Side
     */
    public function setFileUrl($fileUrl)
    {
        $this->fileUrl = $fileUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getFileHash()
    {
        return $this->fileHash;
    }

    /**
     * @param string $fileHash
     * @return Side
     */
    public function setFileHash($fileHash)
    {
        $this->fileHash = $fileHash;

        return $this;
    }

    /**
     * @return string
     */
    public function getCoating()
    {
        return $this->coating;
    }

    /**
     * @param string $coating
     * @return Side
     */
    public function setCoating($coating)
    {
        $this->coating = $coating;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrientation()
    {
        return $this->orientation;
    }

    /**
     * @param string $orientation
     * @return Side
     */
    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;

        return $this;
    }

    /**
     * @param string $spotUvFileHash
     * @return Side
     */
    public function setSpotUvFileHash($spotUvFileHash)
    {
        $this->spotUvFileHash = $spotUvFileHash;

        return $this;
    }

    /**
     * @return string
     */
    public function getSpotUvFileHash()
    {
        return $this->spotUvFileHash;
    }

    /**
     * @param string $spotUvFileUrl
     * @return Side
     */
    public function setSpotUvFileUrl($spotUvFileUrl)
    {
        $this->spotUvFileUrl = $spotUvFileUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getSpotUvFileUrl()
    {
        return $this->spotUvFileUrl;
    }

    /**
     * @param PrintAsset $printAsset
     * @return Side
     */
    public function addPrintAsset(PrintAsset $printAsset)
    {
        $this->printAssets[] = $printAsset;

        return $this;
    }

    /**
     * @return PrintAsset[]
     */
    public function getPrintAssets()
    {
        return $this->printAssets;
    }

    /**
     * @return string
     */
    public function getVariableUvFileUrl()
    {
        return $this->variableUvFileUrl;
    }

    /**
     * @param string $variableUvFileUrl
     * @return Side
     */
    public function setVariableUvFileUrl($variableUvFileUrl)
    {
        $this->variableUvFileUrl = $variableUvFileUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getVariableUvFileHash()
    {
        return $this->variableUvFileUrl;
    }

    /**
     * @param string $variableUvFileHash
     * @return Side
     */
    public function setVariableUvFileHash($variableUvFileHash)
    {
        $this->variableUvFileHash = $variableUvFileHash;

        return $this;
    }

    /**
     * @return string
     */
    public function getFoilFileUrl()
    {
        return $this->foilFileUrl;
    }

    /**
     * @param string $foilFileUrl
     * @return Side
     */
    public function setFoilFileUrl($foilFileUrl)
    {
        $this->foilFileUrl = $foilFileUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getFoilFileHash()
    {
        return $this->foilFileHash;
    }

    /**
     * @param string $foilFileHash
     * @return Side
     */
    public function setFoilFileHash($foilFileHash)
    {
        $this->foilFileHash = $foilFileHash;

        return $this;
    }

    /**
     * @return string
     */
    public function getFoilColor()
    {
        return $this->foilColor;
    }

    /**
     * @param string $foilColor
     * @return Side
     */
    public function setFoilColor($foilColor)
    {
        $this->foilColor = $foilColor;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOpaqueWhiteFileUrl(): ?string
    {
        return $this->opaqueWhiteFileUrl;
    }

    /**
     * @param string|null $opaqueWhiteFileUrl
     * @return Side
     */
    public function setOpaqueWhiteFileUrl(?string $opaqueWhiteFileUrl): Side
    {
        $this->opaqueWhiteFileUrl = $opaqueWhiteFileUrl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOpaqueWhiteFileHash(): ?string
    {
        return $this->opaqueWhiteFileHash;
    }

    /**
     * @param string|null $opaqueWhiteFileHash
     * @return Side
     */
    public function setOpaqueWhiteFileHash(?string $opaqueWhiteFileHash): Side
    {
        $this->opaqueWhiteFileHash = $opaqueWhiteFileHash;

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

        $writer->startElement('side');

        if (isset($this->pageNumber)) {
            $writer->writeElement('page_number', $this->pageNumber);
        }

        if (isset($this->fileUrl)) {
            $writer->writeElement('file_url', $this->fileUrl);
        }

        if (isset($this->fileHash)) {
            $writer->writeElement('file_hash', $this->fileHash);
        }

        if (isset($this->coating)) {
            $writer->writeElement('coating', $this->coating);
        }

        if (isset($this->orientation)) {
            $writer->writeElement('orientation', $this->orientation);
        }

        if (isset($this->spotUvFileUrl)) {
            $writer->writeElement('spot_uv_file_url', $this->spotUvFileUrl);
        }

        if (isset($this->spotUvFileHash)) {
            $writer->writeElement('spot_uv_file_hash', $this->spotUvFileHash);
        }

        if (isset($this->laminating)) {
            $writer->writeElement('laminating', $this->laminating);
        }

        if (isset($this->printAssets)) {
            $writer->writeRaw($this->packPrintAssets());
        }

        if (isset($this->variableUvFileUrl)) {
            $writer->writeElement('variable_uv_file_url', $this->variableUvFileUrl);
        }

        if (isset($this->variableUvFileHash)) {
            $writer->writeElement('variable_uv_file_hash', $this->variableUvFileHash);
        }

        if (isset($this->foilFileUrl)) {
            $writer->writeElement('foil_file_url', $this->foilFileUrl);
        }

        if (isset($this->foilFileHash)) {
            $writer->writeElement('foil_file_hash', $this->foilFileHash);
        }

        if (isset($this->foilColor)) {
            $writer->writeElement('foil_color', $this->foilColor);
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
            'sideNumber' => $this->pageNumber,
            'fileUrl' => $this->fileUrl,
            'fileHash' => $this->fileHash,
            'coating' => $this->coating,
            'laminating' => $this->laminating,
            'foilColor' => $this->foilColor,
            'orientation' => $this->orientation,
            'spotUvFileUrl' => $this->spotUvFileUrl,
            'spotUvFileHash' => $this->spotUvFileHash,
            'variableUvFileUrl' => $this->variableUvFileUrl,
            'variableUvFileHash' => $this->variableUvFileHash,
            'opaqueWhiteFileUrl' => $this->opaqueWhiteFileUrl,
            'opaqueWhiteFileHash' => $this->opaqueWhiteFileHash,
            'foilFileUrl' => $this->foilFileUrl,
            'foilFileHash' => $this->foilFileHash,
            'printAssets' => $this->printAssets,
        ];
    }

    /**
     * @return string
     */
    private function packPrintAssets()
    {
        $writer = new XMLWriter();
        $writer->openMemory();
        $writer->startElement('print_assets');
        foreach ($this->printAssets as $printAsset) {
            $writer->writeRaw($printAsset->pack());
        }
        $writer->endElement();

        return $writer->outputMemory();
    }
}
