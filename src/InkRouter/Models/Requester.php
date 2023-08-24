<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Opensoft\InkRouterSdk\Models;

use \XMLWriter;

/**
 * Contains information about the contract under which the request is being made.
 *
 * @author Kirill Gusakov
 */
class Requester
{

    /**
     * @var string
     * @deprecated
     */
    private $name;

    /**
     * This field determines the SLA (Service Level Agreement).
     * It's basically the "contract" that print customer has with print provider regarding how fast they need to produce.
     * It is stored on the print customer side as the production time and delivery time.
     * These two time periods together constitute the SLA.
     * Currently 3 types of contract are used: RUSH, STANDARD, and FAST
     *
     * @var string
     */
    private $contract;

    /**
     * @var float
     * @deprecated
     */
    private $payTerm;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Requester
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * @param string $contract
     * @return Requester
     */
    public function setContract($contract)
    {
        $this->contract = $contract;
        return $this;
    }

    /**
     * @return float
     */
    public function getPayTerm()
    {
        return $this->payTerm;
    }

    /**
     * @param float $payTerm
     * @return Requester
     */
    public function setPayTerm($payTerm)
    {
        $this->payTerm = $payTerm;
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

        $writer->startElement('requester');

        if (isset($this->name)) {
            $writer->writeElement('name', $this->name);
        }

        if (isset($this->contract)) {
            $writer->writeElement('contract', $this->contract);
        }

        if (isset($this->payTerm)) {
            $writer->writeElement('pay_term', $this->payTerm);
        }
        
        $writer->endElement();

        return $writer->outputMemory();
    }
}
