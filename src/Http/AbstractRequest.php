<?php
/**
 * Created by PhpStorm.
 * User: joro
 * Date: 10.5.2017 г.
 * Time: 16:55 ч.
 */

namespace Omniship\Rapido\Http;

use Omniship\Message\AbstractRequest AS BaseAbstractRequest;
use Omniship\Rapido\Client AS RapidoClient;

abstract class AbstractRequest extends BaseAbstractRequest
{

    /**
     * @var RapidoClient
     */
    protected $client;

    /**
     * @return mixed
     */
    public function getUsername() {
        return $this->getParameter('username');
    }

    /**
     * @param $value
     * @return $this
     */
    public function setUsername($value) {
        return $this->setParameter('username', $value);
    }

    /**
     * @return mixed
     */
    public function getPassword() {
        return $this->getParameter('password');
    }

    /**
     * @param $value
     * @return $this
     */
    public function setPassword($value) {
        return $this->setParameter('password', $value);
    }

    abstract protected function createResponse($data);

    /**
     * @return RapidoClient
     */
    public function getClient()
    {
        if(is_null($this->client)) {
            $this->client = new RapidoClient($this->getUsername(), $this->getPassword(), $this->getTestMode());
        }
        return $this->client;
    }

}