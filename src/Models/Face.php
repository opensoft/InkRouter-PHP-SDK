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
 * Contains information about one face of product
 *
 * @author Anton Kalachev
 */
class Face
{
    /**
     * Face name
     *
     * @var string
     */
    private $faceName;

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
     * Orientation of the page: Landscape/Portrait
     *
     * @var string
     */
    private $orientation;

    /**
     * @var PrintAsset[]
     */
    private $printAssets;

    /**
     * @return string
     */
    public function getFaceName()
    {
        return $this->faceName;
    }

    /**
     * @param string $faceName
     * @return Face
     */
    public function setFaceName($faceName)
    {
        $this->faceName = $faceName;

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
     * @return Face
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
     * @return Face
     */
    public function setFileHash($fileHash)
    {
        $this->fileHash = $fileHash;

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
     * @return Face
     */
    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;

        return $this;
    }

    /**
     * @param PrintAsset $printAsset
     * @return Face
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

        $writer->startElement('face');

        if (isset($this->faceName)) {
            $writer->writeElement('face_name', $this->faceName);
        }

        if (isset($this->fileUrl)) {
            $writer->writeElement('file_url', $this->fileUrl);
        }

        if (isset($this->fileHash)) {
            $writer->writeElement('file_hash', $this->fileHash);
        }

        if (isset($this->orientation)) {
            $writer->writeElement('orientation', $this->orientation);
        }

        if (isset($this->printAssets)) {
            $writer->writeRaw($this->packPrintAssets());
        }

        $writer->endElement();

        return $writer->outputMemory();
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
