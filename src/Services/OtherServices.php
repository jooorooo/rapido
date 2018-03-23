<?php

namespace Rapido\Services;

/**
 * File for class OtherServices
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
 * This class stands for OtherServices originally named OtherServices
 * @package Rapido
 * @subpackage Services
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class OtherServices extends WsdlClass
{
    /**
     * Method to call the operation originally named checkCityFixChas
     * Documentation : Връща информация дали може да се изпраща с фиксиран час за населено място
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_siteid
     * @return boolean
     */
    public function checkCityFixChas($_loginparam,$_siteid)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->checkCityFixChas($_loginparam,$_siteid));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named check_siteid
     * Documentation : Проверка за обмяна със ПОДИЗПЪЛНИТЕЛ.
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param string $_siteid
     * @return string
     */
    public function checkSiteId($_loginparam,$_siteid)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->check_siteid($_loginparam,$_siteid));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Method to call the operation originally named setPrintSettings
     * Documentation : Този метод записва настройките за печат
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param array $_settings
     * @return boolean
     */
    public function setPrintSettings($_loginparam,$_settings)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->setPrintSettings($_loginparam,$_settings));
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Returns the result
     * @see RapidoWsdlClass::getResult()
     * @return array|boolean
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
