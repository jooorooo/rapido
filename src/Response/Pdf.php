<?php

namespace Rapido\Response;

    /**
     * File for class Pdf
     * @package Rapido
     * @subpackage Response
     * @author Georgi Nachev <jooorooo@gmail.com>
     * @version 20150429-01
     * @date 2018-03-09
     */

/**
 * This class stands for Pdf originally named Pdf
 * @package Rapido
 * @subpackage Response
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class Pdf extends AbstractResponse
{
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
        $this->_pdf = $result;
    }

    /**
     * Get pdf base64
     * @return string
     */
    public function getPdf()
    {
        return $this->_pdf;
    }

}