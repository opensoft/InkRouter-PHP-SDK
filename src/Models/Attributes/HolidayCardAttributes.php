<?php

/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace InkRouter\Models\Attributes;

use InkRouter\Models\XmlSerializable;
use InkRouter\Models\ReturnAddress;
use XMLWriter;

/**
 * @author Kirill Gusakov
 */
class HolidayCardAttributes implements XmlSerializable, \JsonSerializable
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
     * @var ReturnAddress
     */
    private $returnAddress;

    /**
     * @param ReturnAddress $returnAddress
     * @return HolidayCardAttributes
     */
    public function setReturnAddress($returnAddress)
    {
        $this->returnAddress = $returnAddress;

        return $this;
    }

    /**
     * @return ReturnAddress
     */
    public function getReturnAddress()
    {
        return $this->returnAddress;
    }

    /**
     * @param bool $sendToSelf
     * @return HolidayCardAttributes
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
     * @return HolidayCardAttributes
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

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'holidayCardAttribute' => [
                'sendToSelf' => $this->sendToSelf,
                'stuffing' => $this->stuffing,
                'returnAddress' => $this->returnAddress
            ]
        ];
    }
}
