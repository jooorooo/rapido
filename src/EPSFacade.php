<?php

namespace Rapido;

/**
 * File for class EPSFacade
 * @package Rapido
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */

use Rapido\Response\BillOfLading;
use Rapido\Response\CodPayment;
use Rapido\Response\Pdf;
use Rapido\Response\RequestCourier;
use Rapido\Response\Tracking;
use Rapido\Services\Order;
use stdClass;
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

    /**
     * @var array
     */
    protected $_services_names = [
        3 => 'Международни куриерски услуги',
        7 => 'Разнос3',
        9 => 'КСК',
    ];

    /**
     * @var array|Get[]|OtherServices[]|Order[]|Calculate[]
     */
    protected static $_services = [];

    protected $soap_options = [];

    protected $connection_timeout = 0;

    protected $retries = 1;

    protected $read_timeout = null;

    /**
     * @param string $url soap url
     * @param string $username User name
     * @param string $password User password
     * @param array $soap_options
     * @param int $connection_timeout
     * @param int $retries
     * @param null $read_timeout
     */
    public function __construct($url, $username, $password, $soap_options = [], $connection_timeout = 0, $retries = 1, $read_timeout = null)
    {
        $this->_url = $url;
        $this->_username = $username;
        $this->_password = $password;
        $this->soap_options = $soap_options;
        $this->connection_timeout = $connection_timeout;
        $this->retries = $retries;
        $this->read_timeout = $read_timeout;
    }

    /**
     * Documentation : Този метод връща списък от предлагани услуги и подуслуги
     * @return Service[]
     * @throws Exception
     */
    public function getServices()
    {
        if(empty(static::$_services['get'])) {
            static::$_services['get'] = new Get($this->getDefaultParams());
        }
        if (($services = static::$_services['get']->getServices($this->getLoginParams())) === false) {
            /** @var Exception $exception */
            $exception = static::$_services['get']->getLastErrorForMethod('Rapido\Services\Get::getServices');
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
        if(empty(static::$_services['get'])) {
            static::$_services['get'] = new Get($this->getDefaultParams());
        }
        if (($result = static::$_services['get']->getSubServices($this->getLoginParams(), $serviceId)) === false) {
            /** @var Exception $exception */
            $exception = static::$_services['get']->getLastErrorForMethod('Rapido\Services\Get::getSubServices');
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
        if(empty(static::$_services['get'])) {
            static::$_services['get'] = new Get($this->getDefaultParams());
        }
        if (($result = static::$_services['get']->getSoapCouriers($this->getLoginParams())) === false) {
            /** @var Exception $exception */
            $exception = static::$_services['get']->getLastErrorForMethod('Rapido\Services\Get::getSoapCouriers');
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
        if(empty(static::$_services['get'])) {
            static::$_services['get'] = new Get($this->getDefaultParams());
        }
        if (($result = static::$_services['get']->getCountries($this->getLoginParams())) === false) {
            /** @var Exception $exception */
            $exception = static::$_services['get']->getLastErrorForMethod('Rapido\Services\Get::getCountries');
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
        if(empty(static::$_services['get'])) {
            static::$_services['get'] = new Get($this->getDefaultParams());
        }
        if (($result = static::$_services['get']->getCities($this->getLoginParams(), $country_id, $start, $count)) === false) {
            /** @var Exception $exception */
            $exception = static::$_services['get']->getLastErrorForMethod('Rapido\Services\Get::getCities');
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
        if(empty(static::$_services['get'])) {
            static::$_services['get'] = new Get($this->getDefaultParams());
        }
        if (($result = static::$_services['get']->findSites($this->getLoginParams(), $name, $country_id)) === false) {
            /** @var Exception $exception */
            $exception = static::$_services['get']->getLastErrorForMethod('Rapido\Services\Get::findSites');
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
        if(empty(static::$_services['get'])) {
            static::$_services['get'] = new Get($this->getDefaultParams());
        }
        if (($result = static::$_services['get']->getStreets($this->getLoginParams(), $city_id, $start, $count)) === false) {
            /** @var Exception $exception */
            $exception = static::$_services['get']->getLastErrorForMethod('Rapido\Services\Get::getStreets');
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
        if(empty(static::$_services['get'])) {
            static::$_services['get'] = new Get($this->getDefaultParams());
        }
        if (($result = static::$_services['get']->getOfficesCity($this->getLoginParams(), $city_id)) === false) {
            /** @var Exception $exception */
            $exception = static::$_services['get']->getLastErrorForMethod('Rapido\Services\Get::getOfficesCity');
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
        if(empty(static::$_services['other_services'])) {
            static::$_services['other_services'] = new OtherServices($this->getDefaultParams());
        }
        if (($result = static::$_services['other_services']->checkCityFixChas($this->getLoginParams(), $city_id)) === false) {
            /** @var Exception $exception */
            if(!empty($exception = static::$_services['other']->getLastErrorForMethod('Rapido\Services\OtherServices::checkCityFixChas'))) {
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
        if(empty(static::$_services['other_services'])) {
            static::$_services['other_services'] = new OtherServices($this->getDefaultParams());
        }
        if (($result = static::$_services['other_services']->checkSiteId($this->getLoginParams(), $city_id)) === false) {
            /** @var Exception $exception */
            $exception = static::$_services['other_services']->getLastErrorForMethod('Rapido\Services\OtherServices::checkSiteId');
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
        if(empty(static::$_services['get'])) {
            static::$_services['get'] = new Get($this->getDefaultParams());
        }
        if (($result = static::$_services['get']->getMyObjects($this->getLoginParams())) === false) {
            /** @var Exception $exception */
            $exception = static::$_services['get']->getLastErrorForMethod('Rapido\Services\Get::getMyObjects');
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
        if(empty(static::$_services['get'])) {
            static::$_services['get'] = new Get($this->getDefaultParams());
        }
        if (($result = static::$_services['get']->getMyObjectInfo($this->getLoginParams(), $object_id)) === false) {
            /** @var Exception $exception */
            $exception = static::$_services['get']->getLastErrorForMethod('Rapido\Services\Get::getMyObjectInfo');
            throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
        }

        return new MyObject($result);
    }

    /**
     * Documentation : Чрез този метод клиентът може да провери каква би била цената на пратка (товарителница).
     * @param array $parameters
     * @param array $services
     * @return Quote
     * @throws Exception
     */
    public function calculate(array $parameters, array $services = [])
    {
        if(empty(static::$_services['calculate'])) {
            static::$_services['calculate'] = new Calculate($this->getDefaultParams());
        }
        
        if (($result = static::$_services['calculate']->calculate($this->getLoginParams(), $parameters)) === false) {
            /** @var Exception $exception */
            if($exception = array_shift(static::$_services['calculate']->getLastError())) {
                throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
            } else {
                throw new Exception('Error calculate!');
            }
        }

        $result['id'] = $parameters['service'] . ($parameters['subservice'] ? '_' . $parameters['subservice'] : '');
        $result['name'] = !empty($services[$parameters['subservice']]) ? $services[$parameters['subservice']] : '';
        if (empty($result['name']) && !empty($this->_services_names[$parameters['service']])) {
            $result['name'] = $this->_services_names[$parameters['service']];
        }
        return new Quote($result);
    }

    /**
     * Documentation : Стздаване на нова товарителница.
     * @param array $parameters
     * @return Quote
     * @throws Exception
     */
    public function createOrder(array $parameters)
    {
        if(empty(static::$_services['order'])) {
            static::$_services['order'] = new Order($this->getDefaultParams());
        }
        if (($result = static::$_services['order']->createOrder($this->getLoginParams(), $parameters)) === false) {
            /** @var Exception $exception */
            $exception = static::$_services['order']->getLastErrorForMethod('Rapido\Services\Order::createOrder');
            throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
        }

        return new BillOfLading($result);
    }

    /**
     * @param $bol_id
     * @param $type
     * @return Pdf
     * @throws Exception
     */
    public function createPdf($bol_id, $type = 1)
    {
        $method = 'printPdf';
        if(strtolower($type) == 'intentional') {
            $method = 'printInternationalPdf';
        }

        if(empty(static::$_services['order'])) {
            static::$_services['order'] = new Order($this->getDefaultParams());
        }
        if (($result = static::$_services['order']->$method($this->getLoginParams(), $bol_id, $type)) === false) {
            /** @var Exception $exception */
            $exception = static::$_services['order']->getLastErrorForMethod('Rapido\Services\Order::' . $method);
            throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
        }

        return new Pdf($result);
    }

    /**
     * Documentation : Анулира товарителница
     * @param $object_id
     * @return boolean
     * @throws Exception
     */
    public function cancelOrder($object_id)
    {
        if(empty(static::$_services['order'])) {
            static::$_services['order'] = new Order($this->getDefaultParams());
        }
        if (($result = static::$_services['order']->cancelOrder($this->getLoginParams(), $object_id)) === false) {
            /** @var Exception $exception */
            if(!empty($exception = static::$_services['order']->getLastErrorForMethod('Rapido\Services\Order::cancelOrder'))) {
                throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
            }
        }

        return $result;
    }

    /**
     * Documentation : Връща информация дали товарителница е изплатена
     * @param $bol_id
     * @return boolean
     * @throws Exception
     */
    public function codPayment($bol_id)
    {
        if(empty(static::$_services['order'])) {
            static::$_services['order'] = new Order($this->getDefaultParams());
        }
        if (($result = static::$_services['order']->getNPInfo($this->getLoginParams(), $bol_id)) === false) {
            /** @var Exception $exception */
            if(!empty($exception = static::$_services['order']->getLastErrorForMethod('Rapido\Services\Order::getNPInfo'))) {
                throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
            }
        }

        return new CodPayment($result);
    }

    /**
     * Documentation : Тракинг на товарителница.
     * @param $bol_id
     * @return null|Tracking
     * @throws Exception
     */
    public function trackOrder($bol_id)
    {
        if(empty(static::$_services['order'])) {
            static::$_services['order'] = new Order($this->getDefaultParams());
        }
        if (($result = static::$_services['order']->trackOrder($this->getLoginParams(), $bol_id)) === false) {
            /** @var Exception $exception */
            if(!empty($exception = static::$_services['order']->getLastErrorForMethod('Rapido\Services\Order::trackOrder'))) {
                throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
            }
        }

        if(!empty($result[0]['DATA']) && !in_array($result[0]['DATA'], ['N/A'])) {
            return new Tracking($result[0]);
        }

        return null;
    }

    /**
     * Documentation : Тракинг на товарителници.
     * @param $bol_id
     * @return Tracking[]
     * @throws Exception
     */
    public function trackOrders(array $bol_id)
    {
        if(empty(static::$_services['order'])) {
            static::$_services['order'] = new Order($this->getDefaultParams());
        }
        if (($result = static::$_services['order']->trackOrders($this->getLoginParams(), $bol_id)) === false) {
            /** @var Exception $exception */
            if(!empty($exception = static::$_services['order']->getLastErrorForMethod('Rapido\Services\Order::trackOrders'))) {
                throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
            }
        }

        $response = [];
        foreach($result AS $group) {
            if(!empty($group[0]['DATA']) && !in_array($group[0]['DATA'], ['N/A'])) {
                $response[$group['AWB']] = new Tracking($group[0]);
            }
        }

        return $response;
    }

    /**
     * Method to call the operation originally named requestCurier
     * Documentation : Заявка за куриер
     * @param int $count
     * @param float $weight
     * @param int $sendoffice
     * @param string $readiness
     * @return array
     * @throws Exception
     */
    public function requestCourier($count, $weight, $sendoffice = 0, $readiness = '')
    {
        if(empty(static::$_services['order'])) {
            static::$_services['order'] = new Order($this->getDefaultParams());
        }
        if (($result = static::$_services['order']->requestCourier($this->getLoginParams(), $count, $weight, $readiness, $sendoffice)) === false) {
            /** @var Exception $exception */
            if(!empty($exception = static::$_services['order']->getLastErrorForMethod('Rapido\Services\Order::requestCourier'))) {
                throw new Exception($exception->getMessage(), $exception->getCode(), $exception);
            }
        }

        return new RequestCourier($result);
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
        return array_merge($this->soap_options, [
            WsdlClass::WSDL_URL => $this->_url,
            WsdlClass::WSDL_TRACE => 1,
            WsdlClass::WSDL_CACHE_WSDL => 0,
            'connection_options' => [
                'connection_timeout' => $this->connection_timeout,
                'read_timeout' => $this->read_timeout,
                'retries' => $this->retries,
            ]
        ]);
    }
}