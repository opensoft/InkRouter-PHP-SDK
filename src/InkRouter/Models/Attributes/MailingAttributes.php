<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

/**
 * @author Kirill Gusakov
 */
class InkRouter_Models_Attributes_MailingAttributes implements InkRouter_Models_Attributes_AttributeInterface
{
    /**
     * @var string
     */
    private $mailClass;

    /**
     * @var string
     */
    private $politicalMailer;

    /**
     * @var string
     */
    private $csvUrl;

    /**
     * @var string
     */
    private $clientInvoice;

    /**
     * @var int
     */
    private $shipExtra;

    /**
     * @param string $clientInvoice
     * @return InkRouter_Models_Attributes_MailingAttributes
     */
    public function setClientInvoice($clientInvoice)
    {
        $this->clientInvoice = $clientInvoice;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientInvoice()
    {
        return $this->clientInvoice;
    }

    /**
     * @param string $csvUrl
     * @return InkRouter_Models_Attributes_MailingAttributes
     */
    public function setCsvUrl($csvUrl)
    {
        $this->csvUrl = $csvUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getCsvUrl()
    {
        return $this->csvUrl;
    }

    /**
     * @param string $mailClass
     * @return InkRouter_Models_Attributes_MailingAttributes
     */
    public function setMailClass($mailClass)
    {
        $this->mailClass = $mailClass;
        return $this;
    }

    /**
     * @return string
     */
    public function getMailClass()
    {
        return $this->mailClass;
    }

    /**
     * @param string $mailPolitical
     * @return InkRouter_Models_Attributes_MailingAttributes
     */
    public function setPoliticalMailer($politicalMailer)
    {
        $this->politicalMailer = $politicalMailer;
        return $this;
    }

    /**
     * @return string
     */
    public function getMailPolitical()
    {
        return $this->mailPolitical;
    }

    /**
     * @param int $shipExtra
     * @return InkRouter_Models_Attributes_MailingAttributes
     */
    public function setShipExtra($shipExtra)
    {
        $this->shipExtra = $shipExtra;
        return $this;
    }

    /**
     * @return int
     */
    public function getShipExtra()
    {
        return $this->shipExtra;
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

        $writer->startElement('mailing_attributes');

        if (isset($this->mailClass)) {
            $writer->writeElement('mail_class', $this->mailClass);
        }

        if (isset($this->politicalMailer) && $this->politicalMailer) {
            $writer->writeElement('political', true);
        }
        
        if (isset($this->csvUrl)) {
            $writer->writeElement('csv_url', $this->csvUrl);
        }
        
        if (isset($this->clientInvoice)) {
            $writer->writeElement('client_invoice', $this->clientInvoice);
        }

        if (isset($this->shipExtra)) {
            $writer->writeElement('ship_extra', $this->shipExtra);
        }
        
        $writer->endElement();

        return $writer->outputMemory();
    }
}
