<?php
/**
 * Created by PhpStorm.
 * User: joro
 * Date: 10.5.2017 г.
 * Time: 16:55 ч.
 */

namespace Omniship\Rapido\Http;

use Omniship\Consts;
use Omniship\Rapido\Client;
use Rapido\Response\Service;
use Omniship\Helper\Arr;

class ShippingQuoteRequest extends AbstractRequest
{

    /**
     * @return array
     */
    public function getData()
    {

        //3, 7, 9 services is without sub services
        $data = [];
        if(!empty($service_id = $this->getServiceId())) {
            if(strpos($service_id, '_') !== false) {
                list($service_id, $sub_service_id) = explode('_', $service_id);
                $data['service'] = $service_id;
                $data['subservice'] = [$sub_service_id];
            } else {
                $data['service'] = $service_id;
            }
        } elseif(!empty($sender_address = $this->getSenderAddress()) && !empty($receiver_address = $this->getReceiverAddress())) {
            if($sender_address->getCountry() && $receiver_address->getCountry() && $sender_address->getCountry()->getId() != $receiver_address->getCountry()->getId()) {
                $data['service'] = 3;
            } elseif($sender_address->getCity() && $receiver_address->getCity() && $sender_address->getCity()->getId() != $receiver_address->getCity()->getId()) {
                $data['service'] = 2;
            } elseif($sender_address->getCity() && $receiver_address->getCity() && $sender_address->getCity()->getId() == $receiver_address->getCity()->getId()) {
                $data['service'] = 1;
            }
        }

        if(empty($data['subservice']) && !empty($data['service'])) {
            if(in_array($data['service'], [3, 7, 9])) {
                $data['subservice'] = [0];
            } elseif(!empty($allowed_services = $this->getAllowedServices())) {
                $data['subservice'] = array_map(function($sub_service) {
                    return Arr::last(explode('_', $sub_service));
                }, array_filter($allowed_services, function($id) use($data) {
                    return strpos($id, $data['service'] . '_') === 0;
                }));
            }
        }

        if(empty($data['subservice']) && !empty($data['service']) && !in_array($data['service'], [3,7,9])) {
            $data['subservice'] = array_map(function(Service $sub_service) {
                return $sub_service->getTypeId();
            }, $this->getClient()->getSubServices($data['service']));
        }

        if(!empty($receiver_address = $this->getReceiverAddress()) && !empty($country = $receiver_address->getCountry()) && $country->getId() != Client::BULGARIA) {
            $data['country_b'] = $country->getId();
        }

        $data['fix_chas'] = (int)$this->getOtherParameters('fixed_time_delivery');
        $data['return_receipt'] = (int)$this->getBackReceipt();
        $data['return_doc'] = (int)$this->getBackDocuments();
        $data['nal_platej'] = (float)$this->getCashOnDeliveryAmount();
        $data['zastrahovka'] = (float)$this->getInsuranceAmount();
        $data['teglo'] = (float)$this->getWeight();

        if($this->getPayer() != Consts::PAYER_RECEIVER) {
            $data['ZASMETKA'] = 0;
        } elseif($this->getPayer() == Consts::PAYER_RECEIVER) {
            $data['ZASMETKA'] = 1;
        }

        if($this->getOtherParameters('price_list') == Consts::PAYER_SENDER) {
            $data['CENOVA_LISTA'] = 1;
        } elseif($this->getOtherParameters('price_list') == Consts::PAYER_RECEIVER) {
            $data['CENOVA_LISTA'] = 2;
        } else {
            $data['CENOVA_LISTA'] = 0;
        }

        return $data;
    }

    public function sendData($data)
    {
        $response = $this->getClient()->calculate($data);
        return $this->createResponse(!$response && $this->getClient()->getError() ? $this->getClient()->getError() : $response);
    }

    /**
     * @param $data
     * @return ShippingQuoteResponse
     */
    protected function createResponse($data)
    {
        return $this->response = new ShippingQuoteResponse($this, $data);
    }

}