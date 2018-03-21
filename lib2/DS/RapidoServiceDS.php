<?php
/**
 * File for class RapidoServiceDS
 * @package Rapido
 * @subpackage Services
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
/**
 * This class stands for RapidoServiceDS originally named DS
 * @package Rapido
 * @subpackage Services
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class RapidoServiceDS extends RapidoWsdlClass
{
    /**
     * Method to call the operation originally named DSoapServerClass
     * Documentation : DSoapServerClass
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @return void
     */
    public function DSoapServerClass()
    {
        try
        {
            return $this->setResult(self::getSoapClient()->DSoapServerClass());
        }
        catch(SoapFault $soapFault)
        {
            return !$this->saveLastError(__METHOD__,$soapFault);
        }
    }
    /**
     * Returns the result
     * @see RapidoWsdlClass::getResult()
     * @return void
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
