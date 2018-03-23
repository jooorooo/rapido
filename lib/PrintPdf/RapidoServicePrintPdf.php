<?php
/**
 * File for class RapidoServicePrint_pdf
 * @package Rapido
 * @subpackage Services
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
/**
 * This class stands for RapidoServicePrint_pdf originally named Print_pdf
 * @package Rapido
 * @subpackage Services
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class RapidoServicePrintPdf extends RapidoWsdlClass
{
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
     * Returns the result
     * @see RapidoWsdlClass::getResult()
     * @return string
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
