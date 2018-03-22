<?php

use Carbon\Carbon;

/**
 * Instances of this class are returned as a result of Rapido web service calls for services
 */
class ResponseWorkingTime extends AbstractResponse
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