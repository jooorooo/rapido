<?php

namespace Rapido\Services;

/**
 * File for class Order
 * @package Rapido
 * @subpackage Services
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */

use Rapido\WsdlClass;
use SoapFault;
use stdClass;

/**
 * This class stands for Order originally named Create_order
 * @package Rapido
 * @subpackage Services
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class Order extends WsdlClass
{
    /**
     * Method to call the operation originally named create_order
     * Documentation : Стздаване на нова товарителница.
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param array $_order_info
     * @return array
     */
    public function createOrder($_loginparam,$_order_info)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->create_order($_loginparam,$_order_info));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named track_order
     * Documentation : Тракинг на товарителница.
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_nomer
     * @return array
     */
    public function trackOrder($_loginparam,$_nomer)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->track_order($_loginparam,$_nomer));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named track_order_array
     * Documentation : Тракинг на товарителници.
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param array $_tarray
     * @return array
     */
    public function trackOrders($_loginparam, array $_tarray)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->track_order_array($_loginparam,$_tarray));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named track_order_ref
     * Documentation : Тракинг на товарителница по реф номер.
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_nomer
     * @return array
     */
    public function trackOrderByRefNumber($_loginparam,$_nomer)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->track_order_ref($_loginparam,$_nomer));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named track_order_ref_array
     * Documentation : Тракинг на товарителници по референция.
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param array $_tarray
     * @return array
     */
    public function trackOrdersByRefNumber($_loginparam, array $_tarray)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->track_order_ref_array($_loginparam,$_tarray));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named track_request
     * Documentation : Тракинг на поръчка
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_nomer
     * @return array
     */
    public function trackRequest($_loginparam,$_nomer)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->track_request($_loginparam, $_nomer));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named requestCurier
     * Documentation : Заявка за куриер
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param int $_broi
     * @param float $_teglo
     * @param string $_readiness
     * @param int $_sendoffice
     * @return array
     */
    public function requestCourier($_loginparam,$_broi,$_teglo,$_readiness,$_sendoffice)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->requestCurier($_loginparam,$_broi,$_teglo,$_readiness,$_sendoffice));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named enrollOrders
     * Documentation : Предване на една (или повече) товарителници на куриер
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param array $_nomera
     * @param string $_curier
     * @return array
     */
    public function enrollOrders($_loginparam, array $_nomera,$_curier)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->enrollOrders($_loginparam,$_nomera,$_curier));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named print_pdf
     * Documentation : Експорт на товарителница в PDF формат.
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param mixed $_nomer
     * @param mixed $_pdfformat
     * @return string
     */
    public function printPdf($_loginparam,$_nomer,$_pdfformat)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->print_pdf($_loginparam,$_nomer,$_pdfformat));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named print_int_pdf
     * Documentation : Експорт на товарителница в PDF формат.
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_nomer
     * @return string
     */
    public function printInternationalPdf($_loginparam,$_nomer)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->print_int_pdf($_loginparam,$_nomer));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named cancellTovaritelnica
     * Documentation : Анулира товарителница
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_tovaritelnica
     * @return boolean
     */
    public function cancelOrder($_loginparam,$_tovaritelnica)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->cancellTovaritelnica($_loginparam,$_tovaritelnica));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named getNPInfo
     * Documentation : Връща информация дали товарителница е изплатена
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_tid
     * @return array
     */
    public function getNPInfo($_loginparam,$_tid)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->getNPInfo($_loginparam,$_tid));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named getRazhodOrderInfo
     * Documentation : Връща списък на товарителници към разходен ордер
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_orderid
     * @return array
     */
    public function getRazhodOrderInfo($_loginparam,$_orderid)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->getRazhodOrderInfo($_loginparam,$_orderid));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named getRazhodOrderInfoPMT
     * Documentation : Връща списък на товарителници към разходен ордер
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_orderid
     * @return array
     */
    public function getRazhodOrderInfoPMT($_loginparam,$_orderid)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->getRazhodOrderInfoPMT($_loginparam,$_orderid));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named getTovarInfo
     * Documentation : Връща информация за товарителница
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_tid
     * @return array
     */
    public function getTovarInfo($_loginparam,$_tid)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->getTovarInfo($_loginparam,$_tid));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named getTovarCurrencyInfo
     * Documentation : Връща информация за превалутиране на товарителница
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_tid
     * @return array
     */
    public function getTovarCurrencyInfo($_loginparam,$_tid)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->getTovarCurrencyInfo($_loginparam,$_tid));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named getTovarInfoTid
     * Documentation : Връща информация за товарителница
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_tid
     * @return array
     */
    public function getTovarInfoTid($_loginparam,$_tid)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->getTovarInfoTid($_loginparam,$_tid));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named getTurnover
     * Documentation : Връща информация за натрупан оборот за период
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_id
     * @param mixed $_pass
     * @param integer $_start
     * @param integer $_end
     * @return array
     */
    public function getTurnover($_loginparam,$_id,$_pass,$_start,$_end)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->getTurnover($_loginparam,$_id,$_pass,$_start,$_end));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named getReturnRedirect
     * Documentation : Връща информация за върнати или пренасочени пратки
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_start
     * @param string $_end
     * @return array
     */
    public function getReturnRedirect($_loginparam,$_start,$_end)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->getReturnRedirect($_loginparam,$_start,$_end));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named getRazhodOrders
     * Documentation : Връща информация за създадени разходни ордери за период
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_start
     * @param string $_end
     * @return array
     */
    public function getRazhodOrders($_loginparam,$_start,$_end)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->getRazhodOrders($_loginparam,$_start,$_end));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named getPrietivOfis
     * Documentation : Връща информация за приети пратки за период
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_start
     * @param string $_end
     * @return array
     */
    public function getPrietivOfis($_loginparam,$_start,$_end)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->getPrietivOfis($_loginparam,$_start,$_end));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named checkOrders
     * Documentation : Проверяване дали са доставени на една (или повече) товарителници
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param array $_nomera
     * @return array
     */
    public function checkOrders($_loginparam, array $_nomera)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->checkOrders($_loginparam,$_nomera));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named checkOrdersStatus
     * Documentation : Проверяване на текущ статус за една (или повече) товарителници
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param array $_nomera
     * @return array
     */
    public function checkOrdersStatus($_loginparam, array $_nomera)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->checkOrdersStatus($_loginparam,$_nomera));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Returns the result
     * @see RapidoWsdlClass::getResult()
     * @return array
     */
    public function getResult()
    {
        return parent::getResult();
    }
    /**
     * Method returning the class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return __CLASS__;
    }
}
