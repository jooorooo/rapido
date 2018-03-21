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
                $subServices = parent::getSubServices($loginParam, $arrStdServices['DATA']);
                if($subServices) {
                    foreach($subServices AS $arrStdSubServices) {
                        $arrListServices[] = new ResultCourierService([
                            'DATA' => implode('_', array($arrStdServices['DATA'], $arrStdSubServices['DATA'])),
                            'LABEL' => implode(' - ', array($arrStdServices['LABEL'], $arrStdSubServices['LABEL']))
                        ]);
                    }
                } else {
                    $arrListServices[] = new ResultCourierService($arrStdServices);
                }
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