<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Opensoft\InkRouterSdk\Models;

use \XMLWriter;

/**
 * Document's header information
 *
 * @author Kirill Gusakov
 */
class HeaderInfo
{
    /**
     * The field is used for differentiating from which vendor order sent
     *
     * @var string
     */
    private $fromDomain;

    /**
     * Identity field that is used for authentication
     *
     * @var string
     */
    private $fromIdentity;

    /**
     * @return string
     */
    public function getFromDomain()
    {
        return $this->fromDomain;
    }

    /**
     * @param string $fromDomain
     * @return HeaderInfo
     */
    public function setFromDomain($fromDomain)
    {
        $this->fromDomain = $fromDomain;
        return $this;
    }

    /**
     * @return string
     */
    public function getFromIdentity()
    {
        return $this->fromIdentity;
    }

    /**
     * @param string $fromIdentity
     * @return HeaderInfo
     */
    public function setFromIdentity($fromIdentity)
    {
        $this->fromIdentity = $fromIdentity;
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

        $writer->startElement('header_info');

        if (isset($this->fromDomain)) {
            $writer->writeElement('from_domain', $this->fromDomain);
        }

        if (isset($this->fromIdentity)) {
            $writer->writeElement('from_identity', $this->fromIdentity);
        }
        
        $writer->endElement();

        return $writer->outputMemory();
    }
}
