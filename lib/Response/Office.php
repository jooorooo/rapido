<?php

namespace Rapido\Response;

/**
 * File for class Office
 * @package Rapido
 * @subpackage Response
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */

use Carbon\Carbon;

/**
 * This class stands for Office originally named Office
 * @package Rapido
 * @subpackage Response
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class Office extends AbstractResponse
{

    /**
     * @var string
     */
    protected $_id;

    /**
     * @var integer Signed 64-bit
     */
    protected $_city_id;

    /**
     * Country name
     * @var string
     */
    protected $_name;

    /**
     * @var string
     */
    protected $_city;

    /**
     * @var string
     */
    protected $_address;

    /**
     * @var string
     */
    protected $_lat;

    /**
     * @var string
     */
    protected $_lng;

    /**
     * @var string
     */
    protected $_eknm;

    /**
     * @var string
     */
    protected $_max_weight;

    /**
     * @var string
     */
    protected $_max_w;

    /**
     * @var string
     */
    protected $_max_h;

    /**
     * @var string
     */
    protected $_max_l;

    /**
     * @var string
     */
    protected $_d1;

    /**
     * @var string
     */
    protected $_d2;

    /**
     * @var string
     */
    protected $_d3;

    /**
     * @var string
     */
    protected $_d4;

    /**
     * @var string
     */
    protected $_d5;

    /**
     * @var string
     */
    protected $_d6;

    /**
     * @var string
     */
    protected $_d7;

    /**
     * Constructs new instance of ResultCourierService
     * @param array $result
     */
    function __construct($result)
    {
        $this->_id = isset($result['DATA']) ? trim($result['DATA']) : null;
        $this->_city_id = isset($result['SITEID']) ? trim($result['SITEID']) : null;
        $this->_name = isset($result['LABEL']) ? trim($result['LABEL']) : null;
        $this->_city = isset($result['CITY']) ? trim($result['CITY']) : null;
        $this->_address = isset($result['ADDRESS']) ? trim($result['ADDRESS']) : null;
        $this->_lat = isset($result['LAT']) ? trim($result['LAT']) : null;
        $this->_lng = isset($result['LNG']) ? trim($result['LNG']) : null;
        $this->_max_weight = isset($result['MAXPARCELWEIGHT']) ? trim($result['MAXPARCELWEIGHT']) : null;
        $this->_max_w = isset($result['MAX_W']) ? trim($result['MAX_W']) : null;
        $this->_max_h = isset($result['MAX_H']) ? trim($result['MAX_H']) : null;
        $this->_max_l = isset($result['MAX_L']) ? trim($result['MAX_L']) : null;
        for($i=1; $i<=7; $i++) {
            $this->{'_d' . $i} = $this->_parseWorkingTime(isset($result['D' . $i]) ? trim($result['D' . $i]) : null);
        }
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return integer Signed 64-bit
     */
    public function getCityId()
    {
        return $this->_city_id;
    }

    /**
     * Get city name
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->_address;
    }

    /**
     * @return float
     */
    public function getLat()
    {
        return $this->_lat;
    }

    /**
     * @return float
     */
    public function getLng()
    {
        return $this->_lng;
    }

    /**
     * @return string
     */
    public function getEKNM()
    {
        return $this->_eknm;
    }

    /**
     * @return float
     */
    public function getMaxWeight()
    {
        return $this->_max_weight;
    }

    /**
     * @return float
     */
    public function getMaxW()
    {
        return $this->_max_w;
    }

    /**
     * @return float
     */
    public function getMaxH()
    {
        return $this->_max_h;
    }

    /**
     * @return float
     */
    public function getMaxL()
    {
        return $this->_max_l;
    }

    /**
     * @return null|WorkingTime
     */
    public function getD1()
    {
        return $this->_d1;
    }

    /**
     * @return null|WorkingTime
     */
    public function getD2()
    {
        return $this->_d2;
    }

    /**
     * @return null|WorkingTime
     */
    public function getD3()
    {
        return $this->_d3;
    }

    /**
     * @return null|WorkingTime
     */
    public function getD4()
    {
        return $this->_d4;
    }

    /**
     * @return null|WorkingTime
     */
    public function getD5()
    {
        return $this->_d5;
    }

    /**
     * @return null|WorkingTime
     */
    public function getD6()
    {
        return $this->_d6;
    }

    /**
     * @return null|WorkingTime
     */
    public function getD7()
    {
        return $this->_d7;
    }

    private function _parseWorkingTime($input) {
        if(preg_match('~^(([\d]{2})\:([\d]{2}))-(([\d]{2})\:([\d]{2}))$~', $input, $match)) {
            return new WorkingTime(['from' => Carbon::createFromFormat('H:i', $match[1], 'Europe/Sofia'), 'to' => Carbon::createFromFormat('H:i', $match[4], 'Europe/Sofia')]);
        }
        return null;
    }

}