<?php
/**
 * File for class RapidoServiceGet
 * @package Rapido
 * @subpackage Services
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
/**
 * This class stands for RapidoServiceGet originally named Get
 * @package Rapido
 * @subpackage Services
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class RapidoServiceGet extends RapidoWsdlClass
{
    /**
     * Method to call the operation originally named getServices
     * Documentation : Този метод връща списък от предлагани услуги
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @return array[]|array
     */
    public function getServices($_loginparam)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->getServices($_loginparam));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named getSubServices
     * Documentation : Този метод връща списък от време за изпълнение да дадена услуга
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param integer $_serviceid
     * @return array[]|array
     */
    public function getSubServices($_loginparam,$_serviceid)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->getSubServices($_loginparam,$_serviceid));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named getSoapCouriers
     * Documentation : Този метод връща списък на куриерите
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @return array
     */
    public function getSoapCouriers($_loginparam)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->getSoapCouriers($_loginparam));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named getCountries
     * Documentation : Този метод връща списък на държавите
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @return array
     */
    public function getCountries($_loginparam)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->getCountries($_loginparam));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named getCityes
     * Documentation : Този метод връща списък на градовете
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_country
     * @param string $_start
     * @param string $_count
     * @return array
     */
    public function getCityes($_loginparam,$_country,$_start,$_count)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->getCityes($_loginparam,$_country,$_start,$_count));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named getStreets
     * Documentation : Този метод връща списък на улиците
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_siteid
     * @param string $_start
     * @param string $_count
     * @return array
     */
    public function getStreets($_loginparam,$_siteid,$_start,$_count)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->getStreets($_loginparam,$_siteid,$_start,$_count));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named getMyObjectInfo
     * Documentation : Този метод връща списък на обектите на клиента
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_sendoffice
     * @return array
     */
    public function getMyObjectInfo($_loginparam,$_sendoffice)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->getMyObjectInfo($_loginparam,$_sendoffice));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named getMyObjects
     * Documentation : Този метод връща списък на обектите на клиента
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @return array
     */
    public function getMyObjects($_loginparam)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->getMyObjects($_loginparam));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named getOfficesCity
     * Documentation : Връща списък на офисите за населено място
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_siteid
     * @return array
     */
    public function getOfficesCity($_loginparam,$_siteid)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->getOfficesCity($_loginparam,$_siteid));
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
     * Method to call the operation originally named getInvoiceType
     * Documentation : Връща информация за типа на фактурата
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @return string
     */
    public function getInvoiceType($_loginparam)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->getInvoiceType($_loginparam));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named getInvoices
     * Documentation : Връща информация за създадени фактури за период
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_start
     * @param string $_end
     * @return array
     */
    public function getInvoices($_loginparam,$_start,$_end)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->getInvoices($_loginparam,$_start,$_end));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Returns the result
     * @see RapidoWsdlClass::getResult()
     * @return array|string
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
