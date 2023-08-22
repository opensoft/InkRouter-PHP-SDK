<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Opensoft\InkRouterSdk\Models;

use \XMLWriter;

/**
 * Root object
 *
 * @author Kirill Gusakov
 */
class OrderInfo
{

    /**
     * Document's header information
     *
     * @var HeaderInfo
     */
    private $headerInfo;

    /**
     * @var PoInfo
     */
    private $poInfo;

    /**
     * @var Order
     */
    private $order;

    /**
     * @var string
     */
    private $printCustomerId;

    /**
     * @return HeaderInfo
     */
    public function getHeaderInfo()
    {
        return $this->headerInfo;
    }

    /**
     * @param HeaderInfo $headerInfo
     * @return OrderInfo
     */
    public function setHeaderInfo(HeaderInfo $headerInfo)
    {
        $this->headerInfo = $headerInfo;
        return $this;
    }

    /**
     * @return PoInfo
     */
    public function getPoInfo()
    {
        return $this->poInfo;
    }

    /**
     * @param PoInfo $poInfo
     * @return OrderInfo
     */
    public function setPoInfo(PoInfo $poInfo)
    {
        $this->poInfo = $poInfo;
        return $this;
    }

    /**
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param Order $order
     * @return OrderInfo
     */
    public function setOrder(Order $order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrintCustomerId()
    {
        return $this->printCustomerId;
    }

    /**
     * @param string $printCustomerId
     * @return OrderInfo
     */
    public function setPrintCustomerId($printCustomerId)
    {
        $this->printCustomerId = $printCustomerId;
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

        $writer->startElement('order_info');

        if (isset($this->headerInfo)) {
            $writer->writeRaw($this->headerInfo->pack());
        }

        if (isset($this->poInfo)) {
            $writer->writeRaw($this->poInfo->pack());
        }

        if (isset($this->order)) {
            $writer->writeRaw($this->order->pack());
        }

        if (isset($this->printCustomerId)) {
            $writer->writeElement('print_customer_id', $this->printCustomerId);
        }
        
        $writer->endElement();

        return $writer->outputMemory();
    }
}
