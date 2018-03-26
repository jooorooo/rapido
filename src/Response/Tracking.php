<?php

namespace Rapido\Response;

    /**
     * File for class Tracking
     * @package Rapido
     * @subpackage Response
     * @author Georgi Nachev <jooorooo@gmail.com>
     * @version 20150429-01
     * @date 2018-03-09
     */
use Carbon\Carbon;

/**
 * This class stands for Tracking originally named Tracking
 * @package Rapido
 * @subpackage Response
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class Tracking extends AbstractResponse
{

    /**
     * @var Carbon
     */
    protected $_data;

    /**
     * @var integer
     */
    protected $_status_code;

    /**
     * @var string
     */
    protected $_status;

    /**
     * @var string
     */
    protected $_place;

    /**
     * Constructs new instance of ResultCourierService
     * @param array $result
     */
    function __construct($result)
    {
        $this->_data = isset($result['DATA']) ? Carbon::createFromFormat('d-m-Y H:i:s', trim($result['DATA']), 'Europe/Sofia') : null;
        $this->_status_code = isset($result['STATUS_CODE']) ? trim($result['STATUS_CODE']) : null;
        $this->_status = isset($result['STATUS']) ? trim($result['STATUS']) : null;
        $this->_place = isset($result['PLACE']) ? trim($result['PLACE']) : null;
    }

    /**
     * @return Carbon|null
     */
    public function getDate()
    {
        return $this->_data;
    }

    /**
     * @return integer
     */
    public function getStatusCode()
    {
        return $this->_status_code;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * @return string
     */
    public function getPlace()
    {
        return $this->_place;
    }

}