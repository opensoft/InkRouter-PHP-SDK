<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

/**
 * Root object
 *
 * @author Kirill Gusakov
 */
class InkRouter_Models_OrderInfo
{

    /**
     * Document's header information
     *
     * @var InkRouter_Models_HeaderInfo
     */
    private $headerInfo;

    /**
     * @var InkRouter_Models_PoInfo
     */
    private $poInfo;

    /**
     * @var InkRouter_Models_Order
     */
    private $order;

    /**
     * @var string
     */
    private $printCustomerId;

    /**
     * @return InkRouter_Models_HeaderInfo
     */
    public function getHeaderInfo()
    {
        return $this->headerInfo;
    }

    /**
     * @param InkRouter_Models_HeaderInfo $headerInfo
     * @return InkRouter_Models_OrderInfo
     */
    public function setHeaderInfo(InkRouter_Models_HeaderInfo $headerInfo)
    {
        $this->headerInfo = $headerInfo;
        return $this;
    }

    /**
     * @return InkRouter_Models_PoInfo
     */
    public function getPoInfo()
    {
        return $this->poInfo;
    }

    /**
     * @param InkRouter_Models_PoInfo $poInfo
     * @return InkRouter_Models_OrderInfo
     */
    public function setPoInfo(InkRouter_Models_PoInfo $poInfo)
    {
        $this->poInfo = $poInfo;
        return $this;
    }

    /**
     * @return InkRouter_Models_Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param InkRouter_Models_Order $order
     * @return InkRouter_Models_OrderInfo
     */
    public function setOrder(InkRouter_Models_Order $order)
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
     * @return InkRouter_Models_OrderInfo
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
