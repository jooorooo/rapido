<?php

namespace Rapido\Response;

/**
 * File for class MyObject
 * @package Rapido
 * @subpackage Response
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */

/**
 * This class stands for MyObject originally named MyObject
 * @package Rapido
 * @subpackage Response
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class MyObject extends AbstractResponse
{

    const STREET_TYPE = 1;
    const QUARTER_TYPE = 2;

    /**
     * City ID
     * @var integer Signed 64-bit
     */
    protected $_id;

    /**
     * @var string
     */
    protected $_company;

    /**
     * Country name
     * @var string
     */
    protected $_name;

    /**
     * @var string
     */
    protected $_mol;

    /**
     * @var string
     */
    protected $_bulstat;

    /**
     * @var string
     */
    protected $_dan_nomer;

    /**
     * @var string
     */
    protected $_office;

    /**
     * @var string
     */
    protected $_eknm;

    /**
     * @var string
     */
    protected $_office_name;

    /**
     * @var string
     */
    protected $_city;

    /**
     * @var string
     */
    protected $_post_code;

    /**
     * @var string
     */
    protected $_street;

    /**
     * @var string
     */
    protected $_street_no;

    /**
     * @var string
     */
    protected $_block;

    /**
     * @var string
     */
    protected $_entrance;

    /**
     * @var string
     */
    protected $_floor;

    /**
     * @var string
     */
    protected $_apartment;

    /**
     * @var string
     */
    protected $_phone;

    /**
     * @var string
     */
    protected $_additional_info;

    /**
     * @var string
     */
    protected $_contact_person;

    /**
     * @var integer
     */
    protected $_site_id;

    /**
     * @var integer
     */
    protected $_street_id;

    /**
     * @var integer
     */
    protected $_street_type;

    /**
     * Constructs new instance of ResultCourierService
     * @param array $result
     */
    function __construct($result)
    {
        $this->_id = isset($result['SOAP_OFFICE_ID']) ? trim($result['SOAP_OFFICE_ID']) : null;
        $this->_company = isset($result['COMPANY']) ? trim($result['COMPANY']) : null;
        $this->_name = isset($result['F_NAME']) ? trim($result['F_NAME']) : null;
        $this->_mol = isset($result['F_MOL']) ? trim($result['F_MOL']) : null;
        $this->_bulstat = isset($result['F_BULSTAT']) ? trim($result['F_BULSTAT']) : null;
        $this->_dan_nomer = isset($result['F_DANNOMER']) ? trim($result['F_DANNOMER']) : null;
        $this->_office = isset($result['OFFICE']) ? trim($result['OFFICE']) : null;
        $this->_office_name = isset($result['OFFICENAME']) ? trim($result['OFFICENAME']) : null;
        $this->_city = isset($result['CITY']) ? trim($result['CITY']) : null;
        $this->_post_code = isset($result['POSTCODE']) ? trim($result['POSTCODE']) : null;
        $this->_street = isset($result['STREET']) ? trim($result['STREET']) : null;
        $this->_street_no = isset($result['STREET_NO']) ? trim($result['STREET_NO']) : null;
        $this->_block = isset($result['BLOCK']) ? trim($result['BLOCK']) : null;
        $this->_entrance = isset($result['ENTRANCE']) ? trim($result['ENTRANCE']) : null;
        $this->_floor = isset($result['FLOOR']) ? trim($result['FLOOR']) : null;
        $this->_apartment = isset($result['APARTMENT']) ? trim($result['APARTMENT']) : null;
        $this->_phone = isset($result['PHONE']) ? trim($result['PHONE']) : null;
        $this->_additional_info = isset($result['ADDITIONAL_INFO']) ? trim($result['ADDITIONAL_INFO']) : null;
        $this->_contact_person = isset($result['CONTACT_PERSON']) ? trim($result['CONTACT_PERSON']) : null;
        $this->_site_id = isset($result['SITEID']) ? trim($result['SITEID']) : null;
        $this->_street_id = isset($result['STREET_ID']) ? trim($result['STREET_ID']) : null;
        $this->_street_type = isset($result['STREET_TYPE']) ? trim($result['STREET_TYPE']) : null;
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
     * @return string
     */
    public function getCompany()
    {
        return $this->_company;
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
    public function getMol()
    {
        return $this->_mol;
    }

    /**
     * @return string
     */
    public function getBulstat()
    {
        return $this->_bulstat;
    }

    /**
     * @return string
     */
    public function getDanNomer()
    {
        return $this->_dan_nomer;
    }

    /**
     * @return string
     */
    public function getOffice()
    {
        return $this->_office;
    }

    /**
     * @return string
     */
    public function getEKNM()
    {
        return $this->_eknm;
    }

    /**
     * @return string
     */
    public function getOfficeName()
    {
        return $this->_office_name;
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
    public function getPostCode()
    {
        return $this->_post_code;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->_street;
    }

    /**
     * @return string
     */
    public function getStreetNo()
    {
        return $this->_street_no;
    }

    /**
     * @return string
     */
    public function getBlock()
    {
        return $this->_block;
    }

    /**
     * @return string
     */
    public function getEntrance()
    {
        return $this->_entrance;
    }

    /**
     * @return string
     */
    public function getFloor()
    {
        return $this->_floor;
    }

    /**
     * @return string
     */
    public function getApartment()
    {
        return $this->_apartment;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @return string
     */
    public function getAdditionalInfo()
    {
        return $this->_additional_info;
    }

    /**
     * @return string
     */
    public function getContactPerson()
    {
        return $this->_contact_person;
    }

    /**
     * @return integer
     */
    public function getSiteId()
    {
        return $this->_site_id;
    }

    /**
     * @return integer
     */
    public function getStreetId()
    {
        return $this->_street_id;
    }

    /**
     * @return integer
     */
    public function getStreetType()
    {
        return $this->_street_type;
    }

}