<?php

namespace Rapido;

use ServerException;
use SoapClient;
use SoapFault;

class EPSSOAPInterfaceImpl extends SoapClient implements EPSInterface {

    /**
     * Constructs new instance of SOAP service
     * @param string $wsdlURL
     * @param options[optional]
     */
    function __construct($wsdlURL, $options=null) {
        if (is_null($options)) {
            parent::__construct($wsdlURL);
        } else {
            parent::__construct($wsdlURL, $options);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getServices($loginParam) {
        try {
            $response = parent::getServices($loginParam);
            $arrListServices = array();
            foreach($response AS $arrStdServices) {
                $arrListServices[] = new ResultCourierService($arrStdServices);
            }
            return $arrListServices;
        } catch (SoapFault $sf) {
            throw new ServerException($sf);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getSubServices($loginParam, $serviceId) {
        try {
            $response = parent::getSubServices($loginParam, $serviceId);
            $arrListServices = array();
            foreach($response AS $arrStdServices) {
                $arrListServices[] = new ResultCourierService($arrStdServices);
            }
            return $arrListServices;
        } catch (SoapFault $sf) {
            throw new ServerException($sf);
        }
    }

}