<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

class OrderInfoTest extends PHPUnit_Framework_TestCase
{

    private $orderInfo;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/order_info.xml', $this->orderInfo->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/order_info.xml', $this->orderInfo->pack());
    }

    protected function setUp()
    {
        $contact = new InkRouter_Models_Contact();
        $contact->setName('contactName')
            ->setPhone('contactPhone')
            ->setEmail('contactEmail');

        $headerInfo = new InkRouter_Models_HeaderInfo();
        $headerInfo->setFromDomain('myprintingdomain.com')
            ->setFromIdentity('BRENT');

        $shipType = new InkRouter_Models_ShipType();
        $shipType->setMethod('UPS')
            ->setServiceLevel('GROUND');

        $shipAddress = new InkRouter_Models_ShipAddress();
        $shipAddress->setCompanyName('Company Name')
            ->setAttention('Attention')
            ->setStreetAddress('742 Evergreen Terrace')
            ->setCity('Springfield')
            ->setState('CA')
            ->setZip('92614')
            ->setCountry('country');

        $shipReturnAddress = new InkRouter_Models_ShipReturnAddress();
        $shipReturnAddress
            ->setCompanyName('Crymerik Industries')
            ->setPersonName('Roger Heath')
            ->setPhoneNumber('8005551234')
            ->setStreetAddress('3911 Viewpark')
            ->setCity('Irvine')
            ->setState('CA')
            ->setZip('92612')
            ->setCountry('US');

        $requester = new InkRouter_Models_Requester();
        $requester->setName('Jaisor Prints')
            ->setContract('STANDARD')
            ->setPayTerm('FREE');

        $poInfo = new InkRouter_Models_PoInfo();
        $poInfo->setAgentId('agentId')
            ->setCurrency('currency');

        $side = new InkRouter_Models_Side();
        $side->setPageNumber(10)
            ->setFileUrl('http://server/images/business_cards/front/0.tif')
            ->setFileHash('0a0825909aa15a98b00574661f23aee7')
            ->setCoating('NONE')
            ->setOrientation('Landscape')
            ->setSpotUvFileUrl('http://server/images/business_cards/front/spot_uv.tif')
            ->setSpotUvFileHash('120825909aa15s2b00574661f23aee7');


        $attributes = new InkRouter_Models_Attributes_ScalarBooleanAttribute();
        $attributes->setType('LABELING');
        $attributes->setValue(true);

        $orderItem = new InkRouter_Models_OrderItem();
        $orderItem->setPrintGroupId('pg4f7969f8a4800')
            ->setProductType('business cards')
            ->setPaperType('14PT')
            ->setQuantity(500)
            ->setRegionSize('US')
            ->setCost('cost')
            ->addAttributes($attributes)
            ->addSide($side);

        $order = new InkRouter_Models_Order();
        $order->setPrintCustomerInvoice(44164524)
            ->setTsCreated('2012-04-04T19:25:21+04:00')
            ->setPriority(0)
            ->setShippingFee(10)
            ->setProductDiscounts(0)
            ->setShippingDiscounts(0)
            ->setVendorId('vendorId')
            ->setContact($contact)
            ->setShipType($shipType)
            ->setRequester($requester)
            ->setShipAddress($shipAddress)
            ->setShipReturnAddress($shipReturnAddress)
            ->addOrderItem($orderItem);

        $orderInfo = new InkRouter_Models_OrderInfo();
        $orderInfo->setHeaderInfo($headerInfo)
            ->setPrintCustomerId('BRENT')
            ->setPoInfo($poInfo)
            ->setOrder($order);

        $this->orderInfo = $orderInfo;
    }
}
