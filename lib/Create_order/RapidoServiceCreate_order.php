<?php
/**
 * File for class RapidoServiceCreate_order
 * @package Rapido
 * @subpackage Services
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
/**
 * This class stands for RapidoServiceCreate_order originally named Create_order
 * @package Rapido
 * @subpackage Services
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class RapidoServiceCreate_order extends RapidoWsdlClass
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
    public function create_order($_loginparam,$_order_info)
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
