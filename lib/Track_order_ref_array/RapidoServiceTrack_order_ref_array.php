<?php
/**
 * File for class RapidoServiceTrack_order_ref_array
 * @package Rapido
 * @subpackage Services
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
/**
 * This class stands for RapidoServiceTrack_order_ref_array originally named Track_order_ref_array
 * @package Rapido
 * @subpackage Services
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class RapidoServiceTrack_order_ref_array extends RapidoWsdlClass
{
    /**
     * Method to call the operation originally named track_order_ref_array
     * Documentation : Тракинг на товарителници по референция.
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param stdClass $_loginparam
     * @param array $_tarray
     * @return array
     */
    public function track_order_ref_array($_loginparam,$_tarray)
    {
        try
        {
            return $this->setResult(self::getSoapClient()->track_order_ref_array($_loginparam,$_tarray));
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
