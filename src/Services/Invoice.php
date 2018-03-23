<?php

namespace Rapido\Services;

/**
 * File for class Invoice
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
 * This class stands for Invoice originally named Invoice
 * @package Rapido
 * @subpackage Services
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class Invoice extends WsdlClass
{
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
