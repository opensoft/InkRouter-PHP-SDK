<?php

/*
 * This file is part of InkRouter-PHP-SDK.
 *
 * Copyright (c) 2012 Opensoft (http://opensoftdev.com)
 */

class ResponseTest extends PHPUnit_Framework_TestCase
{
    private $xml;

    public function testFromPack()
    {
        $response = InkRouter_Response_Response::fromPack($this->xml);
        $update = new InkRouter_Response_Update();
        $update->setId(2)
            ->setType('PRINT')
            ->setQuantity(500)
            ->setOrderItemId('pg4f7969f8a4891')
            ->setComment("SHEET ID: '579468'; POSITION: '1'")
            ->setReplyUrl('http://printserver.com/api/client-updates')
            ->setTimestamp(123456789)
            ->setPrintCustomerInvoice('123a33412fg11')
            ->setMisc('misc')
            ->setTrackingNumber('1234lfdsaj23434')
            ->setWeight(10.2)
            ->setCost(11.1)
            ->setPrintProviderInvoice('1236433fd1123rf');

        $updateShip = new InkRouter_Response_Update();
        $updateShip->setId(3)
            ->setType('SHIP')
            ->setQuantity(500)
            ->setOrderItemId('pg4f7969f8a4891')
            ->setComment("SHIPPING_VENDOR: 'DHL_EXPRESS';SHIP_TYPE: '0';BOX ID: '0';")
            ->setReplyUrl('')
            ->setTimestamp(123456789)
            ->setPrintCustomerInvoice('123a33412fg11')
            ->setMisc('misc')
            ->setTrackingNumber('1234lfdsaj23434')
            ->setWeight(10.2)
            ->setCost(null)
            ->setPrintProviderInvoice('1236433fd1123rf');
        
        $this->assertEquals(array($update, $updateShip), $response->getUpdates());
        $this->assertNull($response->getUpdates()[1]->getCost());
    }

    protected function setUp()
    {
        $fileName = dirname(__FILE__) . '/../fixtures/client_updates.xml';
        $file = fopen($fileName, 'r');
        $this->xml = fread($file, filesize($fileName));
        fclose($file);
    }
}
