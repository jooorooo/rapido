<?php

namespace Rapido;

/**
 * File for class EPSFacade
 * @package Rapido
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */

use stdClass;
use SoapFault;
use Rapido\Services\Calculate;
use Rapido\Services\Get;
use Rapido\Services\OtherServices;
use Rapido\Response\Service;
use Rapido\Response\Country;
use Rapido\Response\City;
use Rapido\Response\Office;
use Rapido\Response\Street;
use Rapido\Response\Courier;
use Rapido\Response\MyObject;
use Rapido\Response\Quote;

/**
 * This class stands for EPSFacade originally named EPSFacade
 * @package Rapido
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class EPSFacade
{

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
    public function __construct($url, $username, $password)
    {
        @ini_set("soap.wsdl_cache_enabled", 0);
        $this->_url = $url;
        $this->_username = $username;
        $this->_password = $password;
    }

    /**
     * Documentation : Този метод връща списък от предлагани услуги и подуслуги
     * @return Service[]
     * @throws Exception
     */
    public function getServices()
    {
        $instance = new Get($this->getDefaultParams());

        if (($services = $instance->getServices($this->getLoginParams())) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('Rapido\Services\Get::getServices');
            throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
        }

        $list = [];
        foreach ($services AS $arrStdServices) {
            $result = $this->getSubServices($arrStdServices['DATA']);
            if (count($result) > 0) {
                foreach ($result AS $arrStdSubServices) {
                    $list[] = new Service([
                        'DATA' => implode('_', array($arrStdServices['DATA'], $arrStdSubServices->getTypeId())),
                        'LABEL' => implode(' - ', array($arrStdServices['LABEL'], $arrStdSubServices->getName()))
                    ]);
                }
            } else {
                $list[] = new Service($arrStdServices);
            }
        }

        return $list;
    }

    /**
     * Documentation : Този метод връща списък от време за изпълнение да дадена услуга
     * @param integer $serviceId
     * @return Service[]
     * @throws Exception
     */
    public function getSubServices($serviceId)
    {
        $instance = new Get($this->getDefaultParams());
        if (($result = $instance->getSubServices($this->getLoginParams(), $serviceId)) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('Rapido\Services\Get::getSubServices');
            throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
        }

        $list = [];
        foreach ($result AS $service) {
            $list[] = new Service($service);
        }

        return $list;
    }

    /**
     * Documentation : Този метод връща списък на куриерите
     * @return Courier[]
     * @throws Exception
     */
    public function getCouriers()
    {
        $instance = new Get($this->getDefaultParams());
        if (($result = $instance->getSoapCouriers($this->getLoginParams())) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('Rapido\Services\Get::getSoapCouriers');
            throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
        }

        $list = [];
        foreach ($result AS $courier) {
            $list[] = new Courier($courier);
        }

        return $list;
    }

    /**
     * Documentation : Този метод връща списък на държавите
     * @return Country[]
     * @throws Exception
     */
    public function getCountries()
    {
        $instance = new Get($this->getDefaultParams());
        if (($result = $instance->getCountries($this->getLoginParams())) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('Rapido\Services\Get::getSoapCouriers');
            throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
        }

        $list = [];
        foreach ($result AS $country) {
            $list[] = new Country($country);
        }

        return $list;
    }

    /**
     * Documentation : Този метод връща списък на градовете
     * @param $country_id
     * @param null $start
     * @param null $count
     * @return City[]
     * @throws Exception
     */
    public function getCities($country_id = 100, $start = null, $count = null)
    {
        $instance = new Get($this->getDefaultParams());
        if (($result = $instance->getCities($this->getLoginParams(), $country_id, $start, $count)) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('Rapido\Services\Get::getCities');
            throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
        }

        $list = [];
        foreach ($result AS $city) {
            $list[] = new City($city);
        }

        return $list;
    }

    /**
     * Documentation : Връща списък с населени места, отговарящи на съответния филтър за търсене.
     * @param $name
     * @param int $country_id
     * @return City[]
     * @throws Exception
     */
    public function findCities($name, $country_id = 100)
    {
        $instance = new Get($this->getDefaultParams());
        if (($result = $instance->findSites($this->getLoginParams(), $name, $country_id)) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('Rapido\Services\Get::findSites');
            throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
        }

        $list = [];
        foreach ($result AS $city) {
            $list[] = new City($city);
        }

        return $list;
    }

    /**
     * Documentation : Този метод връща списък на улиците
     * @param string $city_id
     * @param null $start
     * @param null $count
     * @return Street[]
     * @throws Exception
     */
    public function getStreets($city_id, $start = null, $count = null)
    {
        $instance = new Get($this->getDefaultParams());
        if (($result = $instance->getStreets($this->getLoginParams(), $city_id, $start, $count)) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('Rapido\Services\Get::getStreets');
            throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
        }

        $list = [];
        foreach ($result AS $street) {
            $list[] = new Street($street);
        }

        return $list;
    }

    /**
     * Documentation : Връща списък на офисите за населено място
     * @param $city_id
     * @return Office[]
     * @throws Exception
     */
    public function getOffices($city_id)
    {
        $instance = new Get($this->getDefaultParams());
        if (($result = $instance->getOfficesCity($this->getLoginParams(), $city_id)) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('Rapido\Services\Get::getOfficesCity');
            throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
        }

        $list = [];
        foreach ($result AS $office) {
            if (!empty($office['DATA'])) {
                $list[] = new Office($office);
            }
        }

        return $list;
    }

    /**
     * Documentation : Връща информация дали може да се изпраща с фиксиран час за населено място
     * @param $city_id
     * @return integer
     * @throws Exception
     */
    public function checkCityFixChas($city_id)
    {
        $instance = new OtherServices($this->getDefaultParams());
        if (($result = $instance->checkCityFixChas($this->getLoginParams(), $city_id)) === false) {
            /** @var SoapFault $exception */
            if(!empty($exception = $instance->getLastErrorForMethod('Rapido\Services\OtherServices::checkCityFixChas'))) {
                throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
            }
        }

        return (int)$result;
    }

    /**
     * Documentation : Проверка за обмяна със ПОДИЗПЪЛНИТЕЛ.
     * @param $city_id
     * @return integer
     * @throws Exception
     */
    public function checkSiteId($city_id)
    {
        $instance = new OtherServices($this->getDefaultParams());
        if (($result = $instance->checkSiteId($this->getLoginParams(), $city_id)) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('Rapido\Services\OtherServices::checkSiteId');
            throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
        }

        return (int)($result != 'no');
    }

    /**
     * Documentation : Този метод връща списък на обектите на клиента
     * @return MyObject[]
     * @throws Exception
     */
    public function getMyObjects()
    {
        $instance = new Get($this->getDefaultParams());
        if (($result = $instance->getMyObjects($this->getLoginParams())) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('Rapido\Services\Get::getMyObjects');
            throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
        }

        $list = [];
        foreach ($result AS $object) {
            $list[] = new MyObject($object);
        }

        return $list;
    }

    /**
     * Documentation : Този метод връща информация за обекта на клиента
     * @param $object_id
     * @return MyObject
     * @throws Exception
     */
    public function getMyObjectInfo($object_id)
    {
        $instance = new Get($this->getDefaultParams());
        if (($result = $instance->getMyObjectInfo($this->getLoginParams(), $object_id)) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('Rapido\Services\Get::getMyObjectInfo');
            throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
        }

        return new MyObject($result);
    }

    /**
     * Documentation : Чрез този метод клиентът може да провери каква би била цената на пратка (товарителница).
     * @uses WsdlClass::getSoapClient()
     * @uses WsdlClass::setResult()
     * @uses WsdlClass::saveLastError()
     * @param array $parameters
     * @param array $services
     * @return Quote
     * @throws Exception
     */
    public function calculate(array $parameters, array $services = [])
    {
        $instance = new Calculate($this->getDefaultParams());
        if (($result = $instance->calculate($this->getLoginParams(), $parameters)) === false) {
            /** @var SoapFault $exception */
            $exception = $instance->getLastErrorForMethod('Rapido\Service\Calculate::calculate');
            throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
        }

        $result['id'] = $parameters['service'] . ($parameters['subservice'] ? '_' . $parameters['subservice'] : '');
        $result['name'] = !empty($services[$parameters['subservice']]) ? $services[$parameters['subservice']] : '';
        if (empty($result['name']) && !empty($this->_services_names[$parameters['service']])) {
            $result['name'] = $this->_services_names[$parameters['service']];
        }
        return new Quote($result);
    }

    /**
     * @return stdClass
     */
    protected function getLoginParams()
    {
        $loginParam = new stdClass();
        $loginParam->user = $this->_username;
        $loginParam->pass = $this->_password;
        return $loginParam;
    }

    /**
     * @return array
     */
    protected function getDefaultParams()
    {
        return [
            WsdlClass::WSDL_URL => $this->_url,
            WsdlClass::WSDL_TRACE => 1,
            WsdlClass::WSDL_CACHE_WSDL => 0,
        ];
    }
}