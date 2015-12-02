Introduction
============

InkRouter's PHP SDK is the Job Submission interface to the InkRouter Printing Network. To send print orders directly from your website to InkRouter, you will use
the InkRouter PHP SDK as documented here.

The InkRouter PHP SDK is a library for easy interaction with the InkRouter interface from PHP.

[![Build Status](https://travis-ci.org/opensoft/InkRouter-PHP-SDK.svg?branch=master)](https://travis-ci.org/opensoft/InkRouter-PHP-SDK)

Requirements
============

This SDK requires: 

- PHP 5.0.x and up
- libxml PHP extension

Installation
============

With Composer:

    $ composer require opensoft/inkrouter-php-sdk
    
Without Composer:

- Download a zip [file](https://github.com/opensoft/InkRouter-PHP-SDK/zipball/1.0)
- Unpack downloaded zip in any directory in your project (for example /path/to/your/project/libs/InkRouter)
- InkRouter PHP SDK can use any PSR0 compatible autoloader, or you can use the one included in `tests/bootstrap.php`
  with a simple `require_once` statement

InkRouter Workflow
==================

InkRouter interface workflow consists of 6 actions:

- Get InkRouter client instance
- Create and fill InkRouter_Models_OrderInfo instance
- Create order to InkRouter
- Update order (optional)
- Place on hold order (optional)
- Remove hold order (optional)
- Cancel order (optional)
- Receive order updates from InkRouter

Get InkRouter client instance
-----------------------
Prior to performing any operations, perform get instance of InkRouter client, example:

    $InkRouterClient = new InkRouter_Client_Client($wsdl, $printCustomerId, $secretKey);

Where:

- `$wsdl` is url of InkRouter service
- `$printCustomerId` is your unique identificator from InkRouter
- `$secretKey` is your secret key

Create InkRouter_Models_OrderInfo instance (with example data)
---------------------------------

    $contact = new InkRouter_Models_Contact();
    $contact->setName('contact_name')
        ->setPhone('contact_phone')
        ->setEmail('contact_email');

    $headerInfo = new InkRouter_Models_HeaderInfo();
    $headerInfo->setFromDomain('yoursite.com')
        ->setFromIdentity('your_identity');

    $shipType = new InkRouter_Models_ShipType();
    $shipType->setMethod('UPS')
        ->setServiceLevel('GROUND');

    $shipAddress = new InkRouter_Models_ShipAddress();
    $shipAddress->setAttention('Attention')
        ->setStreetAddress('742 Evergreen Terrace')
        ->setCity('Springfield')
        ->setState('CA')
        ->setZip('1234567')
        ->setCountry('USA');

    $requester = new InkRouter_Models_Requester();
    $requester->setName('Any Prints')
        ->setContract('STANDARD')
        ->setPayTerm('FREE');

    $poInfo = new InkRouter_Models_PoInfo();
    $poInfo->setAgentId('agentId')
        ->setCurrency('US');

    $printAsset = new InkRouter_Models_PrintAsset();
    $printAsset->setPositionX(4.98)
        ->setPositionY(3.1)
        ->setRotation(-90)
        ->setType('BARCODE')
        ->setHeight(0.543)
        ->setWidth(2.12);

    $side = new InkRouter_Models_Side();
    $side->setPageNumber(10)
        ->setFileUrl('http://server/img.jpg')
        ->setFileHash('0a0825909aa15a98b00574661f23aee7')
        ->setCoating('NONE')
        ->setOrientation('Landscape')
        ->addPrintAsset($printAsset);

    $attributes = new InkRouter_Models_Attributes_ScalarBooleanAttribute();
        $attributes->setType('LABELING');
        $attributes->setValue(true);
            
    $orderItem = new InkRouter_Models_OrderItem();
    $orderItem->setPrintGroupId('pg4f7969f8a4811')
        ->setProductType('business cards')
        ->setPaperType('14PT')
        ->setQuantity(500)
        ->setRegionSize('US')
        ->setCost(20.3)
        ->addAttributes($attributes)
        ->addSide($side);

    $order = new InkRouter_Models_Order();
    $order->setPrintCustomerInvoice(123456789)
        ->setTsCreated(date(DATE_ATOM, strtotime('now')))
        ->setPriority(0)
        ->setShippingFee(10)
        ->setProductDiscounts(0)
        ->setShippingDiscounts(0)
        ->setVendorId('vendor_id')
        ->setContact($contact)
        ->setShipType($shipType)
        ->setRequester($requester)
        ->setShipAddress($shipAddress)
        ->addOrderItem($orderItem);

    $orderInfo = new InkRouter_Models_OrderInfo();
    $orderInfo->setHeaderInfo($headerInfo)
        ->setPrintCustomerId('ID')
        ->setPoInfo($poInfo)
        ->setOrder($order);

Create order to InkRouter
--------------
After creating the instance of InkRouter Models_OrderInfo Create Order to InkRouter as below:

    try {
        $orderId = $InkRouterClient->createOrder($timestamp, $orderInfo);
    } catch (InkRouter_Exceptions_Exception $e) {
        echo 'Create operation failed';
    }
    

Where:

- `$timestamp` is unix timestamp (result of mktime() function), if your last operation was unsuccessful, you can resend it with same timestamp
- `$orderInfo` is an instance of InkRouter_Models_OrderInfo (see example)
- `$orderId` is an order identification, received from InkRouter

Update order
------------
You should first create instance of InkRouter Models OrderInfo and call update method:

    try {
        $InkRouterClient->updateOrder($orderId, $timestamp, $orderInfo);
    } catch (InkRouter_Exceptions_Exception $e) {
        echo 'Update operation failed';
    }            
    
Where:

- `$orderId` is identifier of order for update

Place on hold order
-------------------
For place on hold order with id `$orderId` you should do:
    
    try {
        $InkRouterClient->placeOnHold($orderId, $timestamp);
    } catch (InkRouter_Exceptions_Exception $e) {
        echo 'Place on hold operation failed';
    }  

Remove hold order
-----------------
For remove order from hold with id `$orderId` you should do:

    try {
        $InkRouterClient->removeHold($orderId, $timestamp);
    } catch (InkRouter_Exceptions_Exception $e) {
        echo 'Remove hold operation failed';
    }

Cancel order
-----------------
For cancel order with id `$orderId` you should do:

    try {
        $InkRouterClient->cancelOrder($orderId, $timestamp);
    } catch (InkRouter_Exceptions_Exception $e) {
        echo 'Cancel operation failed';
    }

Receive order updates from InkRouter
--------------------------
For successful receiving update messages from InkRouter, you should make any controller, which can receive post requests, add url of this controller in your account through InkRouter-dashboard. Then you can use InkRouter_Response_Response class for parsing xml string from post content:

    $updates = InkRouter_Response_Response::fromPack($xml)->getUpdates();

where `$updates` is array of InkRouter_Response_Update objects and you can use it as you want.

