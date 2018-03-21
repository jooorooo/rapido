<?php
/**
 * File for class RapidoServiceCheck
 * @package Rapido
 * @subpackage Services
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
/**
 * This class stands for RapidoServiceCheck originally named Check
 * @package Rapido
 * @subpackage Services
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class RapidoServiceCheck extends RapidoWsdlClass
{
    /**
     * Method to call the operation originally named checkOrders
     * Documentation : Проверяване дали са доставени на една (или повече) товарителници
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param UNKNOWN $_loginparam
     * @param Array $_nomera
     * @return Array
     */
    public function checkOrders($_loginparam,$_nomera)
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
     * Method to call the operation originally named checkCityFixChas
     * Documentation : Връща информация дали може да се изпраща с фиксиран час за населено място
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param UNKNOWN $_loginparam
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
     * Returns the result
     * @see RapidoWsdlClass::getResult()
     * @return Array|boolean
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
