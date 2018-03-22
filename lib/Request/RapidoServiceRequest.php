<?php
/**
 * File for class RapidoServiceRequest
 * @package Rapido
 * @subpackage Services
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
/**
 * This class stands for RapidoServiceRequest originally named Request
 * @package Rapido
 * @subpackage Services
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class RapidoServiceRequest extends RapidoWsdlClass
{
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
    public function requestCurier($_loginparam,$_broi,$_teglo,$_readiness,$_sendoffice)
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
