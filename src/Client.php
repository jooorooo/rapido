<?php
/**
 * Created by PhpStorm.
 * User: joro
 * Date: 16.5.2017 г.
 * Time: 15:12 ч.
 */

namespace Omniship\Rapido;

use Exception;
use Rapido\EPSFacade;
use Rapido\EPSSOAPInterfaceImpl;
use ResultLogin;
use Rapido\ResultCourierService;

class Client
{

    /**
     * @var EPSFacade
     */
    protected $ePSFacade;

    /**
     * @var ResultLogin
     */
    protected $resultLogin;

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
        try {
            @ini_set("soap.wsdl_cache_enabled", 0);
            $this->ePSFacade = new EPSFacade(new EPSSOAPInterfaceImpl($this->test_mode ? static::SERVER_ADDRESS_DEMO : static::SERVER_ADDRESS_PROD, array('cache_wsdl' => WSDL_CACHE_NONE, 'trace' => 1)), $this->username, $this->password);
            return true;
        } catch (Exception $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }

    /**
     * @return bool|ResultCourierService[]
     */
    public function getServices()
    {
        if(!is_null($this->services)) {
            return $this->services;
        }

        try {
            /* @var $listServices ResultCourierService[] */
            return $this->services = $this->getEPSFacade()->getServices();
        } catch (Exception $e) {
            $this->error = $e->getMessage();
            return false;
        }
    }

    /**
     * @param integer $serviceId
     * @return bool|ResultCourierService[]
     */
    public function getSubServices($serviceId)
    {
        if(!is_null($this->services)) {
            return $this->services;
        }

        try {
            /* @var $listServices ResultCourierService[] */
            return $this->services = $this->getEPSFacade()->getSubServices($serviceId);
        } catch (Exception $e) {
            $this->error = $e->getMessage();
            return false;
        }
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
     * @return EPSFacade
     */
    public function getEPSFacade()
    {
        return $this->ePSFacade;
    }

    /**
     * @param $language
     * @return string
     */
    protected function _languageValidate($language)
    {
        if (!in_array(strtolower($language), ['bg', 'en'])) {
            $language = 'en';
        }
        return strtoupper($language);
    }
}