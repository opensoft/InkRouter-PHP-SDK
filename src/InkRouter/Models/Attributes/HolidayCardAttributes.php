<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

/**
 * @author Kirill Gusakov
 */
class InkRouter_Models_Attributes_HolidayCardAttributes implements InkRouter_Models_Attributes_AttributeInterface
{
    /**
     * @var bool
     */
    private $sendToSelf;

    /**
     * @var bool
     */
    private $stuffing;

    /**
     * @var InkRouter_Models_ReturnAddress
     */
    private $returnAddress;

    /**
     * @param InkRouter_Models_ReturnAddress $returnAddress
     * @return InkRouter_Models_Attributes_HolidayCardAttributes
     */
    public function setReturnAddress($returnAddress)
    {
        $this->returnAddress = $returnAddress;
        return $this;
    }

    /**
     * @return InkRouter_Models_ReturnAddress
     */
    public function getReturnAddress()
    {
        return $this->returnAddress;
    }

    /**
     * @param bool $sendToSelf
     * @return InkRouter_Models_Attributes_HolidayCardAttributes
     */
    public function setSendToSelf($sendToSelf)
    {
        $this->sendToSelf = $sendToSelf;
        return $this;
    }

    /**
     * @return bool
     */
    public function getSendToSelf()
    {
        return $this->sendToSelf;
    }

    /**
     * @param bool $stuffing
     * @return InkRouter_Models_Attributes_HolidayCardAttributes
     */
    public function setStuffing($stuffing)
    {
        $this->stuffing = $stuffing;
        return $this;
    }

    /**
     * @return bool
     */
    public function getStuffing()
    {
        return $this->stuffing;
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

        $writer->startElement('holiday_card_attributes');

        if (isset($this->sendToSelf)) {
            $writer->writeElement('send_to_self', ($this->sendToSelf) ? 'true' : 'false');
        }

        if (isset($this->stuffing)) {
            $writer->writeElement('stuffing', ($this->stuffing) ? 'true' : 'false');
        }

        if (isset($this->returnAddress)) {
            $writer->writeRaw($this->returnAddress->pack());
        }

        $writer->endElement();

        return $writer->outputMemory();
    }
}
