<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Opensoft\InkRouterSdk\Models;

use \XMLWriter;

/**
 * Contains detailed information about a person who is to be notified about the order’s progress
 *
 * @author Kirill Gusakov
 */
class Contact
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $email;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Contact
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Contact
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;
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

        $writer->startElement('contact');

        if (isset($this->name)) {
            $writer->writeElement('name', $this->name);
        }

        if (isset($this->phone)) {
            $writer->writeElement('phone', $this->phone);
        }

        if (isset($this->email)) {
            $writer->writeElement('email', $this->email);
        }
        
        $writer->endElement();

        return $writer->outputMemory();
    }
}
