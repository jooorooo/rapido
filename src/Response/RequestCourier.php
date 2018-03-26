<?php

namespace Rapido\Response;

    /**
     * File for class RequestCourier
     * @package Rapido
     * @subpackage Response
     * @author Georgi Nachev <jooorooo@gmail.com>
     * @version 20150429-01
     * @date 2018-03-09
     */

/**
 * This class stands for RequestCourier originally named RequestCourier
 * @package Rapido
 * @subpackage Response
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class RequestCourier extends AbstractResponse
{

    /**
     * @var boolean
     */
    protected $_success;

    /**
     * @var string
     */
    protected $_error;

    /**
     * Constructs new instance of ResultCourierService
     * @param array $result
     */
    function __construct($result)
    {
        $this->_success = isset($result['SUCCESS']) ? trim($result['SUCCESS']) : null;
        $this->_error = isset($result['ERRORMSG']) ? trim($result['ERRORMSG']) : null;
    }

    /**
     * @return boolean
     */
    public function getSuccess()
    {
        return $this->_success;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->_error;
    }

}