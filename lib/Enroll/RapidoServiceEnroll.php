<?php
/**
 * File for class RapidoServiceEnroll
 * @package Rapido
 * @subpackage Services
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
/**
 * This class stands for RapidoServiceEnroll originally named Enroll
 * @package Rapido
 * @subpackage Services
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class RapidoServiceEnroll extends RapidoWsdlClass
{
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
    public function enrollOrders($_loginparam,$_nomera,$_curier)
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
