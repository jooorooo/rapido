<?php

class EPSRapidoFacade {

    /**
     * SOAP url
     * @var string
     */
    protected $_url;

    /**
     * User name
     * @var string
     */
    protected $_username;

    /**
     * User password
     * @var string
     */
    protected $_password;

    /**
     * @param string $url soap url
     * @param string $username User name
     * @param string $password User password
     */
    function __construct($url, $username, $password) {
        @ini_set("soap.wsdl_cache_enabled", 0);
        $this->_url = $url;
        $this->_username = $username;
        $this->_password = $password;
    }

    /**
     * Documentation : Този метод връща списък от предлагани услуги и подуслуги
     * @return ResultCourierService[]
     * @throws RapidoException
     */
    public function getServices() {
        $instance = new RapidoServiceGet($this->getDefaultParams());

        if(($services = $instance->getServices($this->getLoginParams())) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('RapidoServiceGet::getServices');
            throw new RapidoException($exception->getMessage(), $exception->getCode(), $exception);
        }

        $list = [];
        foreach($services AS $arrStdServices) {
            $result = $this->getSubServices($arrStdServices['DATA']);
            if(count($result) > 0) {
                foreach($result AS $arrStdSubServices) {
                    $list[] = new ResponseResultCourierService([
                        'DATA' => implode('_', array($arrStdServices['DATA'], $arrStdSubServices->getTypeId())),
                        'LABEL' => implode(' - ', array($arrStdServices['LABEL'], $arrStdSubServices->getName()))
                    ]);
                }
            } else {
                $list[] = new ResponseResultCourierService($arrStdServices);
            }
        }

        return $list;
    }

    /**
     * Documentation : Този метод връща списък от време за изпълнение да дадена услуга
     * @param integer $serviceId
     * @return ResultCourierService[]
     * @throws RapidoException
     */
    public function getSubServices($serviceId) {
        $instance = new RapidoServiceGet($this->getDefaultParams());
        if(($result = $instance->getSubServices($this->getLoginParams(), $serviceId)) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('RapidoServiceGet::getSubServices');
            throw new RapidoException($exception->getMessage(), $exception->getCode(), $exception);
        }

        $list = [];
        foreach($result AS $service) {
            $list[] = new ResponseResultCourierService($service);
        }

        return $list;
    }

    /**
     * Documentation : Този метод връща списък на куриерите
     * @return ResponseCouriers[]
     * @throws RapidoException
     */
    public function getCouriers() {
        $instance = new RapidoServiceGet($this->getDefaultParams());
        if(($result = $instance->getSoapCouriers($this->getLoginParams())) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('RapidoServiceGet::getSoapCouriers');
            throw new RapidoException($exception->getMessage(), $exception->getCode(), $exception);
        }

        $list = [];
        foreach($result AS $courier) {
            $list[] = new ResponseCouriers($courier);
        }

        return $list;
    }

    /**
     * Documentation : Този метод връща списък на държавите
     * @return ResponseCountry[]
     * @throws RapidoException
     */
    public function getCountries() {
        $instance = new RapidoServiceGet($this->getDefaultParams());
        if(($result = $instance->getCountries($this->getLoginParams())) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('RapidoServiceGet::getSoapCouriers');
            throw new RapidoException($exception->getMessage(), $exception->getCode(), $exception);
        }

        $list = [];
        foreach($result AS $country) {
            $list[] = new ResponseCountry($country);
        }

        return $list;
    }

    /**
     * Documentation : Този метод връща списък на градовете
     * @param $country_id
     * @param null $start
     * @param null $count
     * @return ResponseCity[]
     * @throws RapidoException
     */
    public function getCities($country_id, $start = null, $count = null) {
        $instance = new RapidoServiceGet($this->getDefaultParams());
        if(($result = $instance->getCityes($this->getLoginParams(), $country_id, $start, $count)) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('RapidoServiceGet::getSoapCouriers');
            throw new RapidoException($exception->getMessage(), $exception->getCode(), $exception);
        }
var_dump($result); exit;
        $list = [];
        foreach($result AS $country) {
            $list[] = new ResponseCountry($country);
        }

        return $list;
    }

    public function calculate(array $parameters) {
        $instance = new RapidoServiceCalculate($this->getDefaultParams());
        if(($result = $instance->calculate($this->getLoginParams(), $parameters)) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('RapidoServiceCalculate::calculate');
            throw new RapidoException($exception->getMessage(), $exception->getCode(), $exception);
        }

        var_dump($result); exit;

        $list = [];
        foreach($result AS $courier) {
            $list[] = new ResponseCouriers([
                'DATA' => $courier['DATA'],
                'LABEL' => $courier['LABEL']
            ]);
        }

        return $list;
    }

    /**
     * @return stdClass
     */
    protected function getLoginParams() {
        $loginParam = new stdClass();
        $loginParam->user = $this->_username;
        $loginParam->pass = $this->_password;
        return $loginParam;
    }

    /**
     * @return array
     */
    protected function getDefaultParams() {
        return [
            RapidoWsdlClass::WSDL_URL => $this->_url,
            RapidoWsdlClass::WSDL_TRACE => 1,
            RapidoWsdlClass::WSDL_CACHE_WSDL => 0,
        ];
    }
}