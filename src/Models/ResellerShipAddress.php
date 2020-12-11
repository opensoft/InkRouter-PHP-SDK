<?php
/*
 * This file is part of AwesomeProject.
 *
 * Copyright (c) 2017 Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace InkRouter\Models;

class ResellerShipAddress extends ShipAddress
{
    /**
     * @var string|null
     */
    protected $personName;

    /**
     * @var string|null
     */
    protected $supportEmail;

    /**
     * @param string|null $personName
     * @return ResellerShipAddress
     */
    public function setPersonName(?string $personName): ResellerShipAddress
    {
        $this->personName = $personName;

        return $this;
    }

    /**
     * @return string
     */
    public function getPersonName()
    {
        return $this->personName;
    }

    /**
     * @return string|null
     */
    public function getSupportEmail(): ?string
    {
        return $this->supportEmail;
    }

    /**
     * @param string|null $supportEmail
     * @return ResellerShipAddress
     */
    public function setSupportEmail(?string $supportEmail): ResellerShipAddress
    {
        $this->supportEmail = $supportEmail;

        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return array_merge(
            parent::jsonSerialize(),
            [
                'personName' => $this->personName,
                'supportEmail' => $this->supportEmail
            ]
        );
    }
}
