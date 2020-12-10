<?php

/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace InkRouter\Models;

use DateTime;
use InkRouter\Utils\OrderProcessor;
use XMLWriter;

/**
 * Contains information about order
 *
 * @author Kirill Gusakov
 */
class Order implements XmlSerializable, \JsonSerializable
{
    /**
     * Invoice number that is given to the order by a printing service client
     *
     * @var string
     */
    private $printCustomerInvoice;

    /**
     * Order creation date
     *
     * @var DateTime
     */
    private $tsCreated;

    /**
     * Order delivery date
     *
     * @var DateTime
     */
    private $deliveryDate;

    /**
     * @var int
     * @deprecated
     */
    private $priority;

    /**
     * @var float
     * @deprecated
     */
    private $shippingFee;

    /**
     * @var int
     * @deprecated
     */
    private $productDiscounts;

    /**
     * @var int
     * @deprecated
     */
    private $shippingDiscounts;

    /**
     * @deprecated
     * @var string
     */
    private $vendorId;
    
    /**
     * If true, a free tip-in will be shipped with the order
     * @var bool
     */
    private $tipIn;

    /**
     * Contains detailed information about a person who is to be notified about the order’s progress
     *
     * @var Contact
     */
    private $contact;

    /**
     * Contains information about shipping
     *
     * @var ShipType
     */
    private $shipType;

    /**
     * Contains information about the contract under which the request is being made.
     *
     * @var Requester
     */
    private $requester;

    /**
     * Contains information about shipping address
     *
     * @var ShipAddress
     */
    private $shipAddress;

    /**
     * Contains information about return shipping address
     *
     * @var ShipReturnAddress
     */
    private $shipReturnAddress;

    /**
     * Contains information about order items. Can include one or more order items.
     *
     * @var array
     */
    private $orderItems = [];

    /**
     * @var ShipAddress|null
     */
    private $storeAddress;

    /**
     * @var ResellerShipAddress|null
     */
    private $shiplabelFromAddress;

    /**
     * @return string
     */
    public function getPrintCustomerInvoice()
    {
        return $this->printCustomerInvoice;
    }

    /**
     * @param string $printCustomerInvoice
     * @return Order
     */
    public function setPrintCustomerInvoice($printCustomerInvoice) 
    {
        $this->printCustomerInvoice = $printCustomerInvoice;

        return $this;
    }

    /**
     * @deprecated This method will be removed in version 2.0.0. Use method getTsCreatedAsDate instead this one.
     * @return string
     */
    public function getTsCreated()
    {
        return $this->tsCreated->format(DateTime::RFC3339);
    }

    /**
     * @return DateTime
     */
    public function getTsCreatedAsDate()
    {
        return $this->tsCreated;
    }


    /**
     * @param DateTime $tsCreated
     * @return Order
     */
    public function setTsCreatedAsDate(DateTime $tsCreated)
    {
        $this->tsCreated = $tsCreated;

        return $this;
    }

    /**
     * @deprecated This method will be removed in version 2.0.0. Use method getDeliveryDateAsDate instead this one.
     * @return string
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate->format(DateTime::RFC3339);
    }

    /**
     * @return DateTime
     */
    public function getDeliveryDateAsDate()
    {
        return $this->deliveryDate;
    }

    /**
     * @param DateTime $deliveryDate
     * @return Order
     */
    public function setDeliveryDateAsDate(DateTime $deliveryDate)
    {
        $this->deliveryDate = $deliveryDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     * @return Order
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return float
     */
    public function getShippingFee()
    {
        return $this->shippingFee;
    }

    /**
     * @param float $shippingFee
     * @return Order
     */
    public function setShippingFee($shippingFee)
    {
        $this->shippingFee = $shippingFee;

        return $this;
    }

    /**
     * @return int
     */
    public function getProductDiscounts()
    {
        return $this->productDiscounts;
    }

    /**
     * @param int $productDiscounts
     * @return Order
     */
    public function setProductDiscounts($productDiscounts)
    {
        $this->productDiscounts = $productDiscounts;

        return $this;
    }

    /**
     * @return int
     */
    public function getShippingDiscounts()
    {
        return $this->shippingDiscounts;
    }

    /**
     * @param int $shippingDiscounts
     * @return Order
     */
    public function setShippingDiscounts($shippingDiscounts)
    {
        $this->shippingDiscounts = $shippingDiscounts;

        return $this;
    }

    /**
     * @return string
     */
    public function getVendorId()
    {
        return $this->vendorId;
    }

    /**
     * @param string $vendorId
     * @return Order
     */
    public function setVendorId($vendorId)
    {
        $this->vendorId = $vendorId;

        return $this;
    }
    
    /**
     * @return bool
     */
    public function getTipIn()
    {
        return $this->tipIn;
    }

    /**
     * @param bool $tipIn
     * @return Order
     */
    public function setTipIn($tipIn)
    {
        $this->tipIn = $tipIn;

        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     * @return Order
     */
    public function setContact(Contact $contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return ShipType
     */
    public function getShipType()
    {
        return $this->shipType;
    }

    /**
     * @param ShipType $shipType
     * @return Order
     */
    public function setShipType(ShipType $shipType)
    {
        $this->shipType = $shipType;

        return $this;
    }

    /**
     * @return Requester
     */
    public function getRequester()
    {
        return $this->requester;
    }

    /**
     * @param Requester $requester
     * @return Order
     */
    public function setRequester(Requester $requester)
    {
        $this->requester = $requester;

        return $this;
    }

    /**
     * @return ShipAddress
     */
    public function getShipAddress()
    {
        return $this->shipAddress;
    }

    /**
     * @param ShipAddress $shipAddress
     * @return Order
     */
    public function setShipAddress(ShipAddress $shipAddress)
    {
        $this->shipAddress = $shipAddress;

        return $this;
    }

    /**
     * @param ShipReturnAddress $shipReturnAddress
     * @return Order
     */
    public function setShipReturnAddress(ShipReturnAddress $shipReturnAddress)
    {
        $this->shipReturnAddress = $shipReturnAddress;

        return $this;
    }

    /**
     * @return ShipReturnAddress
     */
    public function getShipReturnAddress()
    {
        return $this->shipReturnAddress;
    }

    /**
     * @return array
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }

    /**
     * @param OrderItem $orderItem
     * @return Order
     */
    public function addOrderItem(OrderItem $orderItem)
    {
        $this->orderItems[] = $orderItem;

        return $this;
    }

    /**
     * @return ShipAddress|null
     */
    public function getStoreAddress(): ?ShipAddress
    {
        return $this->storeAddress;
    }

    /**
     * @param ShipAddress|null $storeAddress
     * @return Order
     */
    public function setStoreAddress(?ShipAddress $storeAddress): Order
    {
        $this->storeAddress = $storeAddress;

        return $this;
    }

    /**
     * @return ResellerShipAddress|null
     */
    public function getShiplabelFromAddress(): ?ResellerShipAddress
    {
        return $this->shiplabelFromAddress;
    }

    /**
     * @param ResellerShipAddress|null $shiplabelFromAddress
     * @return Order
     */
    public function setShiplabelFromAddress(?ResellerShipAddress $shiplabelFromAddress): Order
    {
        $this->shiplabelFromAddress = $shiplabelFromAddress;

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

        $writer->startElement('order');
        
        if (isset($this->printCustomerInvoice)) {
            $writer->writeElement('print_customer_invoice', $this->printCustomerInvoice);
        }

        if (isset($this->tsCreated)) {
            $writer->writeElement('ts_created', $this->tsCreated->format(DateTime::RFC3339));
        }

        if (isset($this->deliveryDate)) {
            $writer->writeElement('delivery_date', $this->deliveryDate->format(DateTime::RFC3339));
        }

        if (isset($this->priority)) {
            $writer->writeElement('priority', $this->priority);
        }

        if (isset($this->shippingFee)) {
            $writer->writeElement('shipping_fee', $this->shippingFee);
        }

        if (isset($this->productDiscounts)) {
            $writer->writeElement('product_discounts', $this->productDiscounts);
        }

        if (isset($this->shippingDiscounts)) {
            $writer->writeElement('shipping_discounts', $this->shippingDiscounts);
        }

        if (isset($this->vendorId)) {        
            $writer->writeElement('vendor_id', $this->vendorId);
        }

        if (isset($this->tipIn) && $this->tipIn === true) {        
            $writer->writeElement('tip_in', 'true');
        }

        if (isset($this->contact)) {
            $writer->writeRaw($this->contact->pack());
        }

        if (isset($this->shipType)) {
            $writer->writeRaw($this->shipType->pack());
        }

        if (isset($this->requester)) {
            $writer->writeRaw($this->requester->pack());
        }

        if (isset($this->shipAddress)) {
            $writer->writeRaw($this->shipAddress->pack());
        }

        if (isset($this->shipReturnAddress)) {
            $writer->writeRaw($this->shipReturnAddress->pack());
        }

        OrderProcessor::transform($this);

        $writer->startElement('order_items');
        foreach ($this->orderItems as $orderItem) {
            $writer->writeRaw($orderItem->pack());
        }
        $writer->endElement();
        $writer->endElement();

        return $writer->outputMemory();
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $deliveryDate = null;
        if ($this->deliveryDate !== null){
            $deliveryDate = $this->deliveryDate->format(DateTime::RFC3339);
        }
        return [
            'orderId' => $this->printCustomerInvoice,
            'customerName' => null,
            'parentReference' => null,
            'orderDate' => $this->tsCreated->format(DateTime::RFC3339),
            'orderStatus' => null,
            'deliveryDate' => $deliveryDate,
            'priority' => $this->priority,
            'shippingFee' => $this->shippingFee,
            'productDiscounts' => $this->productDiscounts,
            'shippingDiscounts' => $this->shippingDiscounts,
            'currency' => null,
            'tipIn' => $this->tipIn,
            'contact' => $this->contact,
            'shipType' => $this->shipType,
            'requester' => $this->requester,
            'shipAddress' => $this->shipAddress,
            'shiplabelFromAddress' => $this->shiplabelFromAddress,
            'shipReturnAddress' => $this->shipReturnAddress,
            'storeAddress' => $this->storeAddress,
            'orderItems' => $this->orderItems
        ];
    }
}
