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

    protected $_services_names = [
        3 => 'Международни куриерски услуги',
        7 => 'Разнос3',
        9 => 'КСК',
    ];

    /**
     * @param string $url soap url
     * @param string $username User name
     * @param string $password User password
     */
    public function __construct($url, $username, $password) {
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
    public function getCities($country_id = 100, $start = null, $count = null) {
        $instance = new RapidoServiceGet($this->getDefaultParams());
        if(($result = $instance->getCityes($this->getLoginParams(), $country_id, $start, $count)) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('RapidoServiceGet::getCityes');
            throw new RapidoException($exception->getMessage(), $exception->getCode(), $exception);
        }

        $list = [];
        foreach($result AS $city) {
            $list[] = new ResponseCity($city);
        }

        return $list;
    }

    /**
     * Documentation : Този метод връща списък на улиците
     * @param string $city_id
     * @param null $start
     * @param null $count
     * @return ResponseStreet[]
     * @throws RapidoException
     */
    public function getStreets($city_id, $start = null, $count = null) {
        $instance = new RapidoServiceGet($this->getDefaultParams());
        if(($result = $instance->getStreets($this->getLoginParams(), $city_id, $start, $count)) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('RapidoServiceGet::getStreets');
            throw new RapidoException($exception->getMessage(), $exception->getCode(), $exception);
        }

        $list = [];
        foreach($result AS $street) {
            $list[] = new ResponseStreet($street);
        }

        return $list;
    }

    /**
     * Documentation : Връща списък на офисите за населено място
     * @param $city_id
     * @return ResponseOffice[]
     * @throws RapidoException
     */
    public function getOffices($city_id) {
        $instance = new RapidoServiceGet($this->getDefaultParams());
        if(($result = $instance->getOfficesCity($this->getLoginParams(), $city_id)) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('RapidoServiceGet::getOfficesCity');
            throw new RapidoException($exception->getMessage(), $exception->getCode(), $exception);
        }

        $list = [];
        foreach($result AS $office) {
            if(!empty($office['DATA'])) {
                $list[] = new ResponseOffice($office);
            }
        }

        return $list;
    }

    /**
     * Documentation : Връща информация дали може да се изпраща с фиксиран час за населено място
     * @param $city_id
     * @return integer
     * @throws RapidoException
     */
    public function checkCityFixChas($city_id) {
        $instance = new RapidoServiceCheck($this->getDefaultParams());
        if(($result = $instance->checkCityFixChas($this->getLoginParams(), $city_id)) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('RapidoServiceCheck::checkCityFixChas');
            throw new RapidoException($exception->getMessage(), $exception->getCode(), $exception);
        }

        return (int)$result;
    }

    /**
     * Documentation : Този метод връща списък на обектите на клиента
     * @return ResponseMyObjects[]
     * @throws RapidoException
     */
    public function getMyObjects() {
        $instance = new RapidoServiceGet($this->getDefaultParams());
        if(($result = $instance->getMyObjects($this->getLoginParams())) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('RapidoServiceGet::getMyObjects');
            throw new RapidoException($exception->getMessage(), $exception->getCode(), $exception);
        }

        $list = [];
        foreach($result AS $object) {
            $list[] = new ResponseMyObjects($object);
        }

        return $list;
    }

    /**
     * Documentation : Този метод връща информация за обекта на клиента
     * @param $object_id
     * @return ResponseMyObjects
     * @throws RapidoException
     */
    public function getMyObjectInfo($object_id) {
        $instance = new RapidoServiceGet($this->getDefaultParams());
        if(($result = $instance->getMyObjectInfo($this->getLoginParams(), $object_id)) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('RapidoServiceGet::getMyObjectInfo');
            throw new RapidoException($exception->getMessage(), $exception->getCode(), $exception);
        }

        return new ResponseMyObjects($result);
    }

    /**
     * Documentation : Чрез този метод клиентът може да провери каква би била цената на пратка (товарителница).
     * @uses RapidoWsdlClass::getSoapClient()
     * @uses RapidoWsdlClass::setResult()
     * @uses RapidoWsdlClass::saveLastError()
     * @param array $parameters
     * @param array $services
     * @return ResponseQuote
     * @throws RapidoException
     */
    public function calculate(array $parameters, array $services = []) {
        $instance = new RapidoServiceCalculate($this->getDefaultParams());
        if(($result = $instance->calculate($this->getLoginParams(), $parameters)) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('RapidoServiceCalculate::calculate');
            throw new RapidoException($exception->getMessage(), $exception->getCode(), $exception);
        }

        $result['id'] = $parameters['service'] . ($parameters['subservice'] ? '_' . $parameters['subservice'] : '');
        $result['name'] = !empty($services[$parameters['subservice']]) ? $services[$parameters['subservice']] : '';
        if(empty($result['name']) && !empty($this->_services_names[$parameters['service']])) {
            $result['name'] = $this->_services_names[$parameters['service']];
        }
        return new ResponseQuote($result);
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