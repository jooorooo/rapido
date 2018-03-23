<?php

namespace Rapido\Response;

/**
 * File for class WorkingTime
 * @package Rapido
 * @subpackage Response
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */

use Carbon\Carbon;

/**
 * This class stands for WorkingTime originally named WorkingTime
 * @package Rapido
 * @subpackage Response
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class WorkingTime extends AbstractResponse
{

    /**
     * @var null|Carbon
     */
    protected $_from;

    /**
     * @var null|Carbon
     */
    protected $_to;

    /**
     * Constructs new instance of ResultCourierService
     * @param array $result
     */
    function __construct($result)
    {
        $this->_from = isset($result['from']) ? trim($result['from']) : null;
        $this->_to = isset($result['to']) ? trim($result['to']) : null;
    }

    /**
     * @return null|Carbon
     */
    public function getFrom()
    {
        return $this->_from;
    }

    /**
     * @return null|Carbon
     */
    public function getTo()
    {
        return $this->_to;
    }

}