<?php

namespace Rapido;

/**
 * Instances of this class are returned as a result of Speedy web service calls for services
 */
class ResultCourierService extends ResultFormat {

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
     * @param array $stdClassResultCourierService
     */
    function __construct($stdClassResultCourierService) {
        $this->_typeId                        = isset($stdClassResultCourierService['DATA']) ? $stdClassResultCourierService['DATA'] : null;
        $this->_name                          = isset($stdClassResultCourierService['LABEL'])   ? $stdClassResultCourierService['LABEL']   : null;
    }

    /**
     * Get courier service type ID
     * @return integer Signed 64-bit
     */
    public function getTypeId() {
        return $this->_typeId;
    }

    /**
     * Get courier service name
     * @return string
     */
    public function getName() {
        return $this->_name;
    }

}