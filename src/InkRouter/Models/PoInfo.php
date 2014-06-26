<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

/**
 * Contains purchase order information
 *
 * @author Kirill Gusakov
 */
class InkRouter_Models_PoInfo
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
     * @return InkRouter_Models_PoInfo
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
     * @return InkRouter_Models_PoInfo
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
