<?php

/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) Opensoft (http://opensoftdev.com)
 *
 * The unauthorized use of this code outside the boundaries of
 * Opensoft is prohibited.
 */

namespace InkRouter\Tests\Models;

use DateTime;
use DateTimeZone;
use InkRouter\Models\Attributes\ScalarBooleanAttribute;
use InkRouter\Models\Contact;
use InkRouter\Models\Order;
use InkRouter\Models\OrderItem;
use InkRouter\Models\PrintAsset;
use InkRouter\Models\Requester;
use InkRouter\Models\ShipAddress;
use InkRouter\Models\ShipReturnAddress;
use InkRouter\Models\ShipType;
use InkRouter\Models\Side;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    private $order;

    public function testPackWithRoot()
    {
        self::assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/xml/order.xml', $this->order->pack(true));
    }

    public function testPackWithoutRoot()
    {
        self::assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/xml/order.xml', $this->order->pack());
    }

    public function testJsonSerialize()
    {
        self::assertJsonStringEqualsJsonFile(
            dirname(__FILE__) . '/../fixtures/json/order.json',
            json_encode($this->order)
        );
    }

    protected function setUp(): void
    {

        $contact = new Contact();
        $contact->setName('contactName')
            ->setPhone('contactPhone')
            ->setEmail('contactEmail');

        $shipType = new ShipType();
        $shipType->setMethod('UPS')
            ->setServiceLevel('GROUND');

        $shipAddress = new ShipAddress();
        $shipAddress->setCompanyName('Company Name')
            ->setAttention('Attention')
            ->setStreetAddress('742 Evergreen Terrace')
            ->setCity('Springfield')
            ->setState('CA')
            ->setZip('92614')
            ->setCountry('country');

        $shipReturnAddress = new ShipReturnAddress();
        $shipReturnAddress
            ->setCompanyName('Crymerik Industries')
            ->setPersonName('Roger Heath')
            ->setAttention('Roger Heath')
            ->setPhoneNumber('8005551234')
            ->setStreetAddress('3911 Viewpark')
            ->setCity('Irvine')
            ->setState('CA')
            ->setZip('92612')
            ->setCountry('US');

        $requester = new Requester();
        $requester->setName('Jaisor Prints')
            ->setContract('STANDARD')
            ->setPayTerm('FREE');

        $printAsset = new PrintAsset();
        $printAsset->setPositionX(4.98)
            ->setPositionY(3.1)
            ->setRotation(-90)
            ->setType('BARCODE')
            ->setHeight(0.543)
            ->setWidth(2.12);

        $side = new Side();
        $side->setPageNumber(10)
            ->setFileUrl('http://server/images/business_cards/front/0.tif')
            ->setFileHash('0a0825909aa15a98b00574661f23aee7')
            ->setCoating('NONE')
            ->setOrientation('Landscape')
            ->setSpotUvFileUrl('http://server/images/business_cards/front/spot_uv.tif')
            ->setSpotUvFileHash('120825909aa15s2b00574661f23aee7')
            ->addPrintAsset($printAsset);

        $attributes = new ScalarBooleanAttribute();
        $attributes->setType('LABELING');
        $attributes->setValue(true);

        $orderItem = new OrderItem();
        $orderItem->setPrintGroupId('pg4f7969f8a4800')
            ->setProductType('business cards')
            ->setPaperType('14PT')
            ->setQuantity(500)
            ->setRegionSize('US')
            ->setCost('7.75')
            ->addAttributes($attributes)
            ->addSide($side);

        $this->order = new Order();
        $this->order->setPrintCustomerInvoice(44164524)
            ->setTsCreatedAsDate(new DateTime('2012-04-04T19:25:21', new DateTimeZone('Europe/Moscow')))
            ->setDeliveryDateAsDate(new DateTime('2013-05-20T10:20:25', new DateTimeZone('Europe/Moscow')))
            ->setPriority(0)
            ->setShippingFee(10)
            ->setProductDiscounts(0)
            ->setShippingDiscounts(0)
            ->setVendorId('vendorId')
            ->setContact($contact)
            ->setShipType($shipType)
            ->setRequester($requester)
            ->setShipAddress($shipAddress)
            ->setStoreAddress($shipAddress)
            ->setShiplabelFromAddress($shipReturnAddress)
            ->setShipReturnAddress($shipReturnAddress)
            ->addOrderItem($orderItem);
    }
}
