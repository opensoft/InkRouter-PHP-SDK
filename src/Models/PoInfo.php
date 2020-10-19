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
 * Contains purchase order information
 *
 * @author Kirill Gusakov
 */
class PoInfo
{
    /**
     * @var string
     * @deprecated
     */
    private $agentId;

    /**
     * Currency name, e.g.: USD for the United States
     *
     * @var string
     */
    private $currency;

    /**
     * @return string
     */
    public function getAgentId()
    {
        return $this->agentId;
    }

    /**
     * @param string $agentId
     * @return PoInfo
     */
    public function setAgentId($agentId)
    {
        $this->agentId = $agentId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return PoInfo
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
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

        $writer->startElement('po_info');

        if (isset($this->agentId)) {
            $writer->writeElement('agent_id', $this->agentId);
        }

        if (isset($this->currency)) {
            $writer->writeElement('currency', $this->currency);
        }

        $writer->endElement();

        return $writer->outputMemory();
    }
}
