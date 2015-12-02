<?php
/**
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2013 Opensoft (http://opensoftdev.com)
 */

/**
 * @author Alexey Nikolaev <alexey.nikolaev@opensoftdev.ru>
 */
class OrderProcessorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var InkRouter_Models_Order
     */
    private $order;

    public function testPackWithRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/order_processor.xml', $this->order->pack(true));
    }

    public function testPackWithoutRoot()
    {
        $this->assertXmlStringEqualsXmlFile(dirname(__FILE__) . '/../fixtures/order_processor.xml', $this->order->pack());
    }

    protected function setUp()
    {

        $contact = new InkRouter_Models_Contact();
        $contact->setName('contactName')
            ->setPhone('contactPhone')
            ->setEmail('contactEmail');

        $shipType = new InkRouter_Models_ShipType();
        $shipType->setMethod('UPS')
            ->setServiceLevel('GROUND')
            ->setSignature("required");

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

        // order item without envelopes
        $side1 = new InkRouter_Models_Side();
        $side1->setPageNumber(1)
            ->setFileUrl('http://server/images/front/0.tif')
            ->setFileHash('0a0825909aa15a98b00574661f23aee7')
            ->setCoating('NONE')
            ->setOrientation('Landscape')
            ->setSpotUvFileUrl('http://server/images/business_cards/front/spot_uv.tif')
            ->setSpotUvFileHash('120825909aa15s2b00574661f23aee7');;

        $orderItem = new InkRouter_Models_OrderItem();
        $orderItem->setPrintGroupId('pg4f7969f8a4800')
            ->setProductType('business cards')
            ->setPaperType('14PT')
            ->setQuantity(500)
            ->setRegionSize('US')
            ->setCost('cost')
            ->addSide($side1);

        $printAsset = new InkRouter_Models_PrintAsset();
        $printAsset->setPositionX(4.98)
            ->setPositionY(3.1)
            ->setRotation(-90)
            ->setType('BARCODE')
            ->setHeight(0.543)
            ->setWidth(2.12);

        // order item with envelopes
        $side2 = new InkRouter_Models_Side();
        $side2->setPageNumber(1)
            ->setFileUrl('http://server/images/front/1.tif')
            ->setFileHash('0a0825909aa15a98b00574661f23aee7')
            ->setCoating('NONE')
            ->setOrientation('Landscape')
            ->addPrintAsset($printAsset);

        $envelopeAttribute1 = new InkRouter_Models_Attributes_ScalarStringAttribute();
        $envelopeAttribute1->setType('ENVELOPE_TYPE')
            ->setValue('white');

        $envelopeOrderItem = new InkRouter_Models_OrderItem();
        $envelopeOrderItem->setPrintGroupId('pg4f7969f8a4801')
            ->setProductType('4x6 postcards')
            ->setPaperType('14PT')
            ->setQuantity(500)
            ->setRegionSize('US')
            ->setCost('cost')
            ->addAttributes($envelopeAttribute1)
            ->addSide($side2);

        // order item with envelopes and mailing
        $side3 = new InkRouter_Models_Side();
        $side3->setPageNumber(1)
            ->setFileUrl('http://server/images/front/2.tif')
            ->setFileHash('0a0825909aa15a98b00574661f23aee7')
            ->setCoating('NONE')
            ->setOrientation('Landscape');

        $mailingAttributes = new InkRouter_Models_Attributes_MailingAttributes();
        $mailingAttributes
            ->setMailClass('firstclass')
            ->setCsvUrl('http://csv.url')
            ->setClientInvoice('')
            ->setShipExtra(10);

        $envelopeAttribute2 = new InkRouter_Models_Attributes_ScalarStringAttribute();
        $envelopeAttribute2->setType('ENVELOPE_TYPE')
            ->setValue('green');

        $booleanAttribute = new InkRouter_Models_Attributes_ScalarBooleanAttribute();
        $booleanAttribute->setType('LABELING')
            ->setValue(true);

        $mailingOrderItem = new InkRouter_Models_OrderItem();
        $mailingOrderItem->setPrintGroupId('pg4f7969f8a4802')
            ->setProductType('5.5x8.5 stationery')
            ->setPaperType('14PT')
            ->setQuantity(500)
            ->setRegionSize('US')
            ->setCost('cost')
            ->addAttributes($booleanAttribute)
            ->addAttributes($mailingAttributes)
            ->addAttributes($envelopeAttribute2)
            ->addSide($side3);

        $this->order = new InkRouter_Models_Order();
        $this->order->setPrintCustomerInvoice(44164524)
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
            ->addOrderItem($orderItem)
            ->addOrderItem($envelopeOrderItem)
            ->addOrderItem($mailingOrderItem);
    }
}
