<?php
/**
 * File for class RapidoServicePrint_pdf
 * @package Rapido
 * @subpackage Services
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
/**
 * This class stands for RapidoServicePrint_pdf originally named Print_pdf
 * @package Rapido
 * @subpackage Services
 * @author WsdlToPhp Team <contact@wsdltophp.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class RapidoServicePrint_pdf extends RapidoWsdlClass
{
    /**
     * Method to call the operation originally named print_pdf
     * Documentation : Експорт на товарителница в PDF формат.
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param UNKNOWN $_loginparam
     * @param anyType $_nomer
     * @param anyType $_pdfformat
     * @return string
     */
    public function print_pdf($_loginparam,$_nomer,$_pdfformat)
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
