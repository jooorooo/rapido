<?php

namespace Rapido;

use stdClass;
use ClientException;
use ServerException;

class EPSFacade {

    /**
     * EPS Interface implementation
     * @since 1.0
     * @var EPSInterface
     */
    protected $_epsInterfaceImpl;

    /**
     * User name
     * @since 1.0
     * @var string
     */
    protected $_username;

    /**
     * User password
     * @since 1.0
     * @var string
     */
    protected $_password;

    /**
     * Constructs new instance of EPS Facade
     * @since 1.0
     * @param EPSInterface $epsInterfaceImpl EPS interface implementation
     * @param string $username User name
     * @param string $password User password
     */
    function __construct($epsInterfaceImpl, $username, $password) {
        $this->_epsInterfaceImpl = $epsInterfaceImpl;
        $this->_username = $username;
        $this->_password = $password;
    }

    /**
     * Check session state before calling a business web service method
     * @since 1.0
     * @throws ClientException Thrown in case EPS interface implementation is not set
     */
    private function checkStateBeforeCall() {
        if (!isset($this->_epsInterfaceImpl)) {
            throw new ClientException("EPS Interface implementation is not set");
        }
    }

    /**
     * Returns the list of courier services valid on this date
     * @since 1.0
     * @throws ClientException Thrown in case EPS interface implementation is not set
     * @throws ServerException Thrown in case communication with server has failed
     * @return array List of ResultCourierService instances
     */
    public function getServices() {
        $this->checkStateBeforeCall();
        return $this->_epsInterfaceImpl->getServices($this->getLoginParams());
    }
    
    /**
     * Method to call the operation originally named getSubServices
     * Documentation : Този метод връща списък от време за изпълнение да дадена услуга
     * @param integer $serviceId
     * @return array
     */
    public function getSubServices($serviceId) {
        $this->checkStateBeforeCall();
        return $this->_epsInterfaceImpl->getSubServices($this->getLoginParams(), $serviceId);
    }

    /**
     * @return stdClass
     */
    public function getLoginParams() {
        $loginParam = new stdClass();
        $loginParam->user = $this->_username;
        $loginParam->pass = $this->_password;
        return $loginParam;
    }
}