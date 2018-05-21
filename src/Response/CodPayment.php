<?php

namespace Rapido\Response;

    /**
     * File for class CodPayment
     * @package Rapido
     * @subpackage Response
     * @author Georgi Nachev <jooorooo@gmail.com>
     * @version 20150429-01
     * @date 2018-03-09
     */
use Carbon\Carbon;

/**
 * This class stands for CodPayment originally named CodPayment
 * @package Rapido
 * @subpackage Response
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class CodPayment extends AbstractResponse
{

    /**
     * Country ID
     * @var integer Signed 64-bit
     */
    protected $_id;

    /**
     * @var float
     */
    protected $_total;

    /**
     * @var string
     */
    protected $_city;

    /**
     * @var integer
     */
    protected $_company_id;

    /**
     * @var string
     */
    protected $_razhoden_order;

    /**
     * @var string
     */
    protected $_ref_number;

    /**
     * @var Carbon
     */
    protected $_data;

    /**
     * Constructs new instance of ResultCourierService
     * @param array $result
     */
    function __construct($result)
    {
        $this->_id = isset($result['TOVARITELNICA']) ? trim($result['TOVARITELNICA']) : null;
        $this->_total = isset($result['SUMA']) ? trim($result['SUMA']) : null;
        $this->_city = isset($result['CITY']) ? trim($result['CITY']) : null;
        $this->_company_id = isset($result['COMPANY_ID']) ? trim($result['COMPANY_ID']) : null;
        $this->_razhoden_order = isset($result['RAZHODORDER']) ? trim($result['RAZHODORDER']) : null;
        $this->_ref_number = isset($result['CLIENT_REF1']) ? trim($result['CLIENT_REF1']) : null;
        $this->_data = isset($result['IZPLATENODATA']) ? Carbon::createFromFormat('Y-m-d H:i:s', trim($result['IZPLATENODATA']), 'Europe/Sofia') : null;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return Carbon|null
     */
    public function getDate()
    {
        return $this->_data;
    }

    /**
     * @return float
     */
    public function getTotal()
    {
        return $this->_total;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * @return integer
     */
    public function getCompanyId()
    {
        return $this->_company_id;
    }

    /**
     * @return string
     */
    public function getRazhodenOrder()
    {
        return $this->_razhoden_order;
    }

    /**
     * @return string
     */
    public function getRefNumber()
    {
        return $this->_ref_number;
    }

}