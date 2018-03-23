<?php

namespace Rapido\Response;

/**
 * File for class Street
 * @package Rapido
 * @subpackage Response
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */

/**
 * This class stands for Street originally named Street
 * @package Rapido
 * @subpackage Response
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class Street extends AbstractResponse
{

    const STREET_TYPE = 1;
    const QUARTER_TYPE = 2;

    /**
     * City ID
     * @var integer Signed 64-bit
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
    protected $_prefix;

    /**
     * @var string
     */
    protected $_street_type;

    /**
     * Constructs new instance of ResultCourierService
     * @param array $result
     */
    function __construct($result)
    {
        $this->_id = isset($result['STREETID']) ? trim($result['STREETID']) : null;
        $this->_city_id = isset($result['SITEID']) ? trim($result['SITEID']) : null;
        $this->_name = isset($result['STREETNAME']) ? trim($result['STREETNAME']) : null;
        $this->_prefix = isset($result['STREETTYPE']) ? trim($result['STREETTYPE']) : null;
        $this->_street_type = isset($result['STREETTYPE2']) ? trim($result['STREETTYPE2']) : null;
    }

    /**
     * Get courier service type ID
     * @return integer Signed 64-bit
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
    public function getPrefix()
    {
        return $this->_prefix;
    }

    /**
     * @return string
     */
    public function getStreetType()
    {
        return $this->_street_type;
    }

}