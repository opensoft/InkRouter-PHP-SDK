<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

namespace Tests\InkRouter\Models;

use \DateTime;
use \DateTimeZone;
use Opensoft\InkRouterSdk\Models\Attributes\ScalarBooleanAttribute;
use Opensoft\InkRouterSdk\Models\Contact;
use Opensoft\InkRouterSdk\Models\PrintAsset;
use Opensoft\InkRouterSdk\Models\Order;
use Opensoft\InkRouterSdk\Models\OrderItem;
use Opensoft\InkRouterSdk\Models\Requester;
use Opensoft\InkRouterSdk\Models\ShipAddress;
use Opensoft\InkRouterSdk\Models\ShipReturnAddress;
use Opensoft\InkRouterSdk\Models\ShipType;
use Opensoft\InkRouterSdk\Models\Side;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{

    private $order;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/order.xml', $this->order->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/order.xml', $this->order->pack());
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
            ->setCost('cost')
            ->addAttributes($attributes)
            ->addSide($side);

        $this->order = new Order();
        $this->order->setPrintCustomerInvoice(44164524)
            ->setTsCreated('2012-04-04T19:25:21.203+04:00')
            ->setDeliveryDateAsDate(new DateTime('2013-05-20T10:20:25', new DateTimeZone('Europe/Moscow')))
            ->setPriority(0)
            ->setShippingFee(10)
            ->setTax(1)
            ->setProductDiscounts(0)
            ->setShippingDiscounts(0)
            ->setVendorId('vendorId')
            ->setContact($contact)
            ->setShipType($shipType)
            ->setRequester($requester)
            ->setShipAddress($shipAddress)
            ->setShipReturnAddress($shipReturnAddress)
            ->addOrderItem($orderItem);
    }
}
