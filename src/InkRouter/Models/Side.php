<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */


/**
 * Contains information about one side of product
 *
 * @author Kirill Gusakov
 */
class InkRouter_Models_Side
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
     * @return int
     */
    public function getPageNumber()
    {
        return $this->pageNumber;
    }

    /**
     * @param int $pageNumber
     * @return InkRouter_Models_Side
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
     * @return InkRouter_Models_Side
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
     * @return InkRouter_Models_Side
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
     * @return InkRouter_Models_Side
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
     * @return InkRouter_Models_Side
     */
    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;
        return $this;
    }

    /**
     * @param string $spotUvFileHash
     * @return InkRouter_Models_Side
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
     * @return InkRouter_Models_Side
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
        
        $writer->endElement();

        return $writer->outputMemory();
    }


}
