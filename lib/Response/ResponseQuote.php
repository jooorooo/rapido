<?php

/**
 * Instances of this class are returned as a result of Rapido web service calls for services
 */
class ResponseQuote extends AbstractResponse
{

    /**
     * Country ID
     * @var integer Signed 64-bit
     */
    protected $_id;

    /**
     * Country name
     * @var string
     */
    protected $_name;

    /**
     * @var string|integer
     */
    protected $_PERROR;

    /**
     * @var float
     */
    protected $_fix_chas;

    /**
     * @var float
     */
    protected $_return_receipt;

    /**
     * @var float
     */
    protected $_return_doc;

    /**
     * @var float
     */
    protected $_nal_platej;

    /**
     * @var float
     */
    protected $_zastrahovka;

    /**
     * @var float
     */
    protected $_tax_usluga;

    /**
     * @var float
     */
    protected $_DDS;

    /**
     * @var float
     */
    protected $_TOTAL;

    /**
     * Constructs new instance of ResultCourierService
     * @param array $result
     */
    function __construct($result)
    {
        $this->_id = isset($result['id']) ? trim($result['id']) : null;
        $this->_name = isset($result['name']) ? trim($result['name']) : null;
        $this->_PERROR = isset($result['PERROR']) ? trim($result['PERROR']) : null;
        $this->_fix_chas = isset($result['fix_chas']) ? (float)trim($result['fix_chas']) : null;
        $this->_return_receipt = isset($result['return_receipt']) ? (float)trim($result['return_receipt']) : null;
        $this->_return_doc = isset($result['return_doc']) ? (float)trim($result['return_doc']) : null;
        $this->_nal_platej = isset($result['nal_platej']) ? (float)trim($result['nal_platej']) : null;
        $this->_zastrahovka = isset($result['zastrahovka']) ? (float)trim($result['zastrahovka']) : null;
        $this->_tax_usluga = isset($result['tax_usluga']) ? (float)trim($result['tax_usluga']) : null;
        $this->_DDS = isset($result['DDS']) ? (float)trim($result['DDS']) : null;
        $this->_TOTAL = isset($result['TOTAL']) ? (float)trim($result['TOTAL']) : null;
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
     * Get courier service name
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @return string|integer
     */
    public function getError()
    {
        return $this->_PERROR;
    }

    /**
     * @return float
     */
    public function getFixChas()
    {
        return $this->_fix_chas;
    }

    /**
     * @return float
     */
    public function getReturnReceipt()
    {
        return $this->_return_receipt;
    }

    /**
     * @return float
     */
    public function getReturnDoc()
    {
        return $this->_return_doc;
    }

    /**
     * @return float
     */
    public function getNalPlatej()
    {
        return $this->_nal_platej;
    }

    /**
     * @return float
     */
    public function getZastrahovka()
    {
        return $this->_zastrahovka;
    }

    /**
     * @return float
     */
    public function getTaxUsluga()
    {
        return $this->_tax_usluga;
    }

    /**
     * @return float
     */
    public function getDDS()
    {
        return $this->_DDS;
    }

    /**
     * @return float
     */
    public function getTOTAL()
    {
        return $this->_TOTAL;
    }

}