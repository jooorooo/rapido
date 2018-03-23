<?php

namespace Rapido\Response;

    /**
     * File for class BillOfLading
     * @package Rapido
     * @subpackage Response
     * @author Georgi Nachev <jooorooo@gmail.com>
     * @version 20150429-01
     * @date 2018-03-09
     */

/**
 * This class stands for BillOfLading originally named BillOfLading
 * @package Rapido
 * @subpackage Response
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class BillOfLading extends AbstractResponse
{

    /**
     * Country ID
     * @var integer Signed 64-bit
     */
    protected $_id;

    /**
     * @var string base64
     */
    protected $_pdf;

    /**
     * @var float
     */
    protected $_total;

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
        $this->_id = isset($result['TOVARITELNICA']) ? trim($result['TOVARITELNICA']) : null;
        $this->_pdf = isset($result['PDF']) ? trim($result['PDF']) : null;
        $this->_total = isset($result['TOTAL']) ? trim($result['TOTAL']) : null;
        $this->_error = isset($result['ERROR']) ? trim($result['ERROR']) : null;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Get pdf base64
     * @return string
     */
    public function getPdf()
    {
        return $this->_pdf;
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
    public function getError()
    {
        return $this->_error;
    }

}