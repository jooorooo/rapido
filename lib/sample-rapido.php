<?php

/**
 * Wsdl instanciation infos. By default, nothing has to be set.
 * If you wish to override the SoapClient's options, please refer to the sample below.
 * 
 * This is an associative array as:
 * - the key must be a RapidoWsdlClass constant beginning with WSDL_
 * - the value must be the corresponding key value
 * Each option matches the {@link http://www.php.net/manual/en/soapclient.soapclient.php} options
 * 
 * Here is below an example of how you can set the array:
 * $wsdl = array();
 * $wsdl[RapidoWsdlClass::WSDL_URL] = 'https://www.rapido.bg/testsystem/schema.wsdl';
 * $wsdl[RapidoWsdlClass::WSDL_CACHE_WSDL] = WSDL_CACHE_NONE;
 * $wsdl[RapidoWsdlClass::WSDL_TRACE] = true;
 * $wsdl[RapidoWsdlClass::WSDL_LOGIN] = 'myLogin';
 * $wsdl[RapidoWsdlClass::WSDL_PASSWD] = '**********';
 * etc....
 * Then instantiate the Service class as: 
 * - $wsdlObject = new RapidoWsdlClass($wsdl);
 */
/**
 * Examples
 */


/******************************
 * Example for RapidoServiceGet
 */
$rapidoServiceGet = new RapidoServiceGet();

// sample call for RapidoServiceGet::getRazhodOrderInfo()
if($rapidoServiceGet->getRazhodOrderInfo($_loginparam,$_orderid))
    print_r($rapidoServiceGet->getResult());
else
    print_r($rapidoServiceGet->getLastError());
// sample call for RapidoServiceGet::getRazhodOrderInfoPMT()
if($rapidoServiceGet->getRazhodOrderInfoPMT($_loginparam,$_orderid))
    print_r($rapidoServiceGet->getResult());
else
    print_r($rapidoServiceGet->getLastError());
// sample call for RapidoServiceGet::getNPInfo()
if($rapidoServiceGet->getNPInfo($_loginparam,$_tid))
    print_r($rapidoServiceGet->getResult());
else
    print_r($rapidoServiceGet->getLastError());
// sample call for RapidoServiceGet::getTovarInfo()
if($rapidoServiceGet->getTovarInfo($_loginparam,$_tid))
    print_r($rapidoServiceGet->getResult());
else
    print_r($rapidoServiceGet->getLastError());
// sample call for RapidoServiceGet::getTovarCurrencyInfo()
if($rapidoServiceGet->getTovarCurrencyInfo($_loginparam,$_tid))
    print_r($rapidoServiceGet->getResult());
else
    print_r($rapidoServiceGet->getLastError());
// sample call for RapidoServiceGet::getTovarInfoTid()
if($rapidoServiceGet->getTovarInfoTid($_loginparam,$_tid))
    print_r($rapidoServiceGet->getResult());
else
    print_r($rapidoServiceGet->getLastError());
// sample call for RapidoServiceGet::getTurnover()
if($rapidoServiceGet->getTurnover($_loginparam,$_id,$_pass,$_start,$_end))
    print_r($rapidoServiceGet->getResult());
else
    print_r($rapidoServiceGet->getLastError());
// sample call for RapidoServiceGet::getReturnRedirect()
if($rapidoServiceGet->getReturnRedirect($_loginparam,$_start,$_end))
    print_r($rapidoServiceGet->getResult());
else
    print_r($rapidoServiceGet->getLastError());
// sample call for RapidoServiceGet::getRazhodOrders()
if($rapidoServiceGet->getRazhodOrders($_loginparam,$_start,$_end))
    print_r($rapidoServiceGet->getResult());
else
    print_r($rapidoServiceGet->getLastError());
// sample call for RapidoServiceGet::getPrietivOfis()
if($rapidoServiceGet->getPrietivOfis($_loginparam,$_start,$_end))
    print_r($rapidoServiceGet->getResult());
else
    print_r($rapidoServiceGet->getLastError());
// sample call for RapidoServiceGet::getInvoiceType()
if($rapidoServiceGet->getInvoiceType($_loginparam))
    print_r($rapidoServiceGet->getResult());
else
    print_r($rapidoServiceGet->getLastError());
// sample call for RapidoServiceGet::getInvoices()
if($rapidoServiceGet->getInvoices($_loginparam,$_start,$_end))
    print_r($rapidoServiceGet->getResult());
else
    print_r($rapidoServiceGet->getLastError());

/******************************
 * Example for RapidoServiceSet
 */
$rapidoServiceSet = new RapidoServiceSet();
// sample call for RapidoServiceSet::setPrintSettings()
if($rapidoServiceSet->setPrintSettings($_loginparam,$_settings))
    print_r($rapidoServiceSet->getResult());
else
    print_r($rapidoServiceSet->getLastError());

/************************************
 * Example for RapidoServiceCalculate
 */
$rapidoServiceCalculate = new RapidoServiceCalculate();
// sample call for RapidoServiceCalculate::calculate()
if($rapidoServiceCalculate->calculate($_loginparam,$_calculation))
    print_r($rapidoServiceCalculate->getResult());
else
    print_r($rapidoServiceCalculate->getLastError());

/*******************************
 * Example for RapidoServiceList
 */
$rapidoServiceList = new RapidoServiceList();
// sample call for RapidoServiceList::listSites()
if($rapidoServiceList->listSites($_loginparam,$_name,$_country))
    print_r($rapidoServiceList->getResult());
else
    print_r($rapidoServiceList->getLastError());

/***************************************
 * Example for RapidoServiceCreate_order
 */
$rapidoServiceCreate_order = new RapidoServiceCreate_order();
// sample call for RapidoServiceCreate_order::create_order()
if($rapidoServiceCreate_order->create_order($_loginparam,$_order_info))
    print_r($rapidoServiceCreate_order->getResult());
else
    print_r($rapidoServiceCreate_order->getLastError());

/************************************
 * Example for RapidoServicePrint_pdf
 */
$rapidoServicePrint_pdf = new RapidoServicePrint_pdf();
// sample call for RapidoServicePrint_pdf::print_pdf()
if($rapidoServicePrint_pdf->print_pdf($_loginparam,$_nomer,$_pdfformat))
    print_r($rapidoServicePrint_pdf->getResult());
else
    print_r($rapidoServicePrint_pdf->getLastError());

/****************************************
 * Example for RapidoServicePrint_int_pdf
 */
$rapidoServicePrint_int_pdf = new RapidoServicePrint_int_pdf();
// sample call for RapidoServicePrint_int_pdf::print_int_pdf()
if($rapidoServicePrint_int_pdf->print_int_pdf($_loginparam,$_nomer))
    print_r($rapidoServicePrint_int_pdf->getResult());
else
    print_r($rapidoServicePrint_int_pdf->getLastError());

/**************************************
 * Example for RapidoServiceTrack_order
 */
$rapidoServiceTrack_order = new RapidoServiceTrack_order();
// sample call for RapidoServiceTrack_order::track_order()
if($rapidoServiceTrack_order->track_order($_loginparam,$_nomer))
    print_r($rapidoServiceTrack_order->getResult());
else
    print_r($rapidoServiceTrack_order->getLastError());

/********************************************
 * Example for RapidoServiceTrack_order_array
 */
$rapidoServiceTrack_order_array = new RapidoServiceTrack_order_array();
// sample call for RapidoServiceTrack_order_array::track_order_array()
if($rapidoServiceTrack_order_array->track_order_array($_loginparam,$_tarray))
    print_r($rapidoServiceTrack_order_array->getResult());
else
    print_r($rapidoServiceTrack_order_array->getLastError());

/******************************************
 * Example for RapidoServiceTrack_order_ref
 */
$rapidoServiceTrack_order_ref = new RapidoServiceTrack_order_ref();
// sample call for RapidoServiceTrack_order_ref::track_order_ref()
if($rapidoServiceTrack_order_ref->track_order_ref($_loginparam,$_nomer))
    print_r($rapidoServiceTrack_order_ref->getResult());
else
    print_r($rapidoServiceTrack_order_ref->getLastError());

/************************************************
 * Example for RapidoServiceTrack_order_ref_array
 */
$rapidoServiceTrack_order_ref_array = new RapidoServiceTrack_order_ref_array();
// sample call for RapidoServiceTrack_order_ref_array::track_order_ref_array()
if($rapidoServiceTrack_order_ref_array->track_order_ref_array($_loginparam,$_tarray))
    print_r($rapidoServiceTrack_order_ref_array->getResult());
else
    print_r($rapidoServiceTrack_order_ref_array->getLastError());

/****************************************
 * Example for RapidoServiceTrack_request
 */
$rapidoServiceTrack_request = new RapidoServiceTrack_request();
// sample call for RapidoServiceTrack_request::track_request()
if($rapidoServiceTrack_request->track_request($_loginparam,$_nomer))
    print_r($rapidoServiceTrack_request->getResult());
else
    print_r($rapidoServiceTrack_request->getLastError());

/**********************************
 * Example for RapidoServiceCancell
 */
$rapidoServiceCancell = new RapidoServiceCancell();
// sample call for RapidoServiceCancell::cancellTovaritelnica()
if($rapidoServiceCancell->cancellTovaritelnica($_loginparam,$_tovaritelnica))
    print_r($rapidoServiceCancell->getResult());
else
    print_r($rapidoServiceCancell->getLastError());

/*********************************
 * Example for RapidoServiceEnroll
 */
$rapidoServiceEnroll = new RapidoServiceEnroll();
// sample call for RapidoServiceEnroll::enrollOrders()
if($rapidoServiceEnroll->enrollOrders($_loginparam,$_nomera,$_curier))
    print_r($rapidoServiceEnroll->getResult());
else
    print_r($rapidoServiceEnroll->getLastError());

/**********************************
 * Example for RapidoServiceRequest
 */
$rapidoServiceRequest = new RapidoServiceRequest();
// sample call for RapidoServiceRequest::requestCurier()
if($rapidoServiceRequest->requestCurier($_loginparam,$_broi,$_teglo,$_readiness,$_sendoffice))
    print_r($rapidoServiceRequest->getResult());
else
    print_r($rapidoServiceRequest->getLastError());

/********************************
 * Example for RapidoServiceCheck
 */
$rapidoServiceCheck = new RapidoServiceCheck();
// sample call for RapidoServiceCheck::checkOrders()
if($rapidoServiceCheck->checkOrders($_loginparam,$_nomera))
    print_r($rapidoServiceCheck->getResult());
else
    print_r($rapidoServiceCheck->getLastError());


