<?php

/**
 * Instances of this class are returned as a result of Rapido web service calls for services
 */
class ResponseCity extends AbstractResponse
{

    /**
     * City ID
     * @var integer Signed 64-bit
     */
    protected $_id;

    /**
     * Country ID
     * @var integer Signed 64-bit
     */
    protected $_country_id;

    /**
     * Country name
     * @var string
     */
    protected $_name;

    /**
     * @var string
     */
    protected $_oblast;

    /**
     * @var string
     */
    protected $_obshtina;

    /**
     * @var string
     */
    protected $_site_type;

    /**
     * @var string
     */
    protected $_post_code;

    /**
     * @var string
     */
    protected $_eknm;

    /**
     * @var string
     */
    protected $_delivery_week_days;

    /**
     * Constructs new instance of ResultCourierService
     * @param array $result
     */
    function __construct($result)
    {
        $this->_id = isset($result['SITEID']) ? trim($result['SITEID']) : null;
        $this->_country_id = isset($result['COUNTRYID_ISO']) ? trim($result['COUNTRYID_ISO']) : null;
        $this->_name = isset($result['NAME']) ? trim($result['NAME']) : null;
        $this->_oblast = isset($result['OBLAST']) ? trim($result['OBLAST']) : null;
        $this->_obshtina = isset($result['OBSHTINA']) ? trim($result['OBSHTINA']) : null;
        $this->_site_type = isset($result['SITETYPE']) ? trim($result['SITETYPE']) : null;
        $this->_post_code = isset($result['POSTCODE']) ? trim($result['POSTCODE']) : null;
        $this->_delivery_week_days = isset($result['DELIVERYWEEKDAYS']) ? trim($result['DELIVERYWEEKDAYS']) : null;
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
    public function getCountryId()
    {
        return $this->_country_id;
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
    public function getOblast()
    {
        return $this->_oblast;
    }

    /**
     * @return string
     */
    public function getObshtina()
    {
        return $this->_obshtina;
    }

    /**
     * @return string
     */
    public function getSiteType()
    {
        return $this->_site_type;
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
    public function getEKNM()
    {
        return $this->_eknm;
    }

    /**
     * @return string
     */
    public function getDeliveryWeekDays()
    {
        return $this->_delivery_week_days;
    }

}