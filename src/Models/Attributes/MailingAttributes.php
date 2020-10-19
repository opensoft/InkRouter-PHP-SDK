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

use XMLWriter;

/**
 * @author Kirill Gusakov
 */
class MailingAttributes implements AttributeInterface
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
     * @var string
     */
    private $mailingFont;

    /**
     * @param string $clientInvoice
     * @return MailingAttributes
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
     * @return MailingAttributes
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
     * @return MailingAttributes
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
     * @param string $politicalMailer
     * @return MailingAttributes
     */
    public function setPoliticalMailer($politicalMailer)
    {
        $this->politicalMailer = $politicalMailer;

        return $this;
    }

    /**
     * @return string
     */
    public function getPoliticalMailer()
    {
        return $this->politicalMailer;
    }

    /**
     * @param int $shipExtra
     * @return MailingAttributes
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
     * @return string
     */
    public function getMailingFont()
    {
        return $this->mailingFont;
    }

    /**
     * @param string $mailingFont
     * @return MailingAttributes
     */
    public function setMailingFont($mailingFont)
    {
        $this->mailingFont = $mailingFont;

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

        $writer->startElement('mailing_attributes');

        if (isset($this->mailClass)) {
            $writer->writeElement('mail_class', $this->mailClass);
        }

        if (isset($this->politicalMailer) && $this->politicalMailer) {
            $writer->writeElement('political', true);
        }
        
        if (isset($this->csvUrl)) {
            $writer->startElement('csv_url');
            $writer->writeCdata($this->csvUrl);
            $writer->endElement();
        }
        
        if (isset($this->clientInvoice)) {
            $writer->writeElement('client_invoice', $this->clientInvoice);
        }

        if (isset($this->shipExtra)) {
            $writer->writeElement('ship_extra', $this->shipExtra);
        }

        if (isset($this->mailingFont)) {
            $writer->writeElement('mailing_font', $this->mailingFont);
        }

        $writer->endElement();

        return $writer->outputMemory();
    }
}
