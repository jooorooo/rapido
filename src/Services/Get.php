<?php

namespace Rapido\Services;

/**
 * File for class Get
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
 * This class stands for Get originally named Get
 * @package Rapido
 * @subpackage Services
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class Get extends WsdlClass
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
    public function getCities($_loginparam,$_country,$_start,$_count)
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
     * Method to call the operation originally named listSites
     * Documentation : Връща списък с населени места, отговарящи на съответния филтър за търсене.
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_name
     * @param int $_country
     * @return array
     */
    public function findSites($_loginparam,$_name,$_country)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->listSites($_loginparam,$_name,$_country));
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
