<?php
/**
 * Created by PhpStorm.
 * User: joro
 * Date: 16.5.2017 г.
 * Time: 15:12 ч.
 *
 * http://www.rapido.bg/soap_help/
 */

namespace Omniship\Rapido;

use Omniship\Helper\Arr;
use RapidoException;
use EPSRapidoFacade;
use ResponseResultCourierService;
use ResponseCountry;
use ResponseCouriers;
use ResponseQuote;

class Client
{

    /**
     * @var EPSRapidoFacade
     */
    protected $ePSFacade;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var bool
     */
    protected $test_mode;

    protected $error;

    protected $services;

    const SERVER_ADDRESS_DEMO = 'https://www.rapido.bg/testsystem/schema.wsdl';

    const SERVER_ADDRESS_PROD = 'https://www.rapido.bg/rsystem2/schema.wsdl';

    const VAT_PERCENTAGE = 20;

    const BULGARIA = 100;

    public function __construct($username, $password, $test_mode)
    {
        $this->username = $username;
        $this->password = $password;
        $this->test_mode = $test_mode;
        $this->initialize();
    }

    /**
     * @return bool
     */
    public function initialize()
    {
        $this->ePSFacade = new EPSRapidoFacade($this->test_mode ? static::SERVER_ADDRESS_DEMO : static::SERVER_ADDRESS_PROD, $this->username, $this->password);
    }

    /**
     * @return bool|ResponseResultCourierService[]
     */
    public function getServices()
    {
        if(!is_null($this->services)) {
            return $this->services;
        }

        try {
            return $this->services = $this->getEPSFacade()->getServices();
        } catch (RapidoException $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }

    /**
     * @param integer $serviceId
     * @return bool|ResponseResultCourierService[]
     */
    public function getSubServices($serviceId)
    {
        try {
            return $this->getEPSFacade()->getSubServices($serviceId);
        } catch (RapidoException $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }

    /**
     * @return bool|ResponseCouriers[]
     */
    public function getCouriers()
    {
        try {
            return $this->getEPSFacade()->getCouriers();
        } catch (RapidoException $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }

    /**
     * @return bool|ResponseCountry[]
     */
    public function getCountries()
    {
        try {
            return $this->getEPSFacade()->getCountries();
        } catch (RapidoException $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }

    /**
     * @param $country_id
     * @param null $start
     * @param null $count
     * @return bool|ResponseCity[]
     */
    public function getCities($country_id, $start = null, $count = null)
    {
        try {
            return $this->getEPSFacade()->getCities($country_id, $start, $count);
        } catch (RapidoException $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }

    /**
     * @param array $parameters
     * @param array|null $allowed_services
     * @return ResponseQuote[]
     */
    public function calculate(array $parameters, array $allowed_services = null)
    {
        $service_id = !empty($parameters['service']) ? $parameters['service'] : 0;
        if(!$service_id) {
            return [];
        }
        if(!in_array($service_id, [3,7,9])) {
            if (empty($allowed_services)) {
                $allowed_services = array_map(function (ResponseResultCourierService $service) {
                    return $service->getTypeId();
                }, $this->getServices());
            }
            $sub_services = array_filter($allowed_services, function($id) use($service_id) {
                return strpos($id, $service_id . '_') === 0;
            });

        } else {
            $sub_services = [0];
        }

        $services = [];
        foreach($this->getSubServices($service_id) AS $s) {
            $services[$s->getTypeId()] = $s->getName();
        }

        $quotes = [];
        foreach($sub_services AS $sub) {
            try {
                $parameters['subservice'] = Arr::last(explode('_', $sub));
                $quotes[] =  $this->getEPSFacade()->calculate($parameters, $services);
            } catch (RapidoException $e) {
                $quotes[] = new ResponseQuote([
                    'id' => $sub,
                    'name' => !empty($services[$parameters['subservice']]) ? $services[$parameters['subservice']] : '',
                    'PERROR' => $e->getMessage()
                ]);
            }
        }
        return $quotes;
    }

    /**
     * @param boolean $test_mode
     * @return Client
     */
    public function setTestMode($test_mode)
    {
        $this->test_mode = $test_mode;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getTestMode()
    {
        return $this->test_mode;
    }

    /**
     * @param string $username
     * @return Client
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $password
     * @return Client
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $error
     * @return $this
     */
    public function setError($error)
    {
        $this->error = $error;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return EPSRapidoFacade
     */
    public function getEPSFacade()
    {
        return $this->ePSFacade;
    }
}