<?php

/**
 * Instances of this class are returned as a result of Rapido web service calls for services
 */
class ResponseResultCourierService extends AbstractResponse
{

    /**
     * Courier service type ID
     * @var integer Signed 64-bit
     */
    protected $_typeId;

    /**
     * Courier service name
     * @var string
     */
    protected $_name;

    /**
     * Constructs new instance of ResultCourierService
     * @param array $result
     */
    function __construct($result)
    {
        $this->_typeId = isset($result['DATA']) ? trim($result['DATA']) : null;
        $this->_name = isset($result['LABEL']) ? trim($result['LABEL']) : null;
    }

    /**
     * Get courier service type ID
     * @return integer Signed 64-bit
     */
    public function getTypeId()
    {
        return $this->_typeId;
    }

    /**
     * Get courier service name
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

}