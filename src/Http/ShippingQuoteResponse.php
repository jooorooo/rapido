<?php
/**
 * Created by PhpStorm.
 * User: joro
 * Date: 10.5.2017 г.
 * Time: 17:22 ч.
 */

namespace Omniship\Rapido\Http;

use Omniship\Common\ShippingQuoteBag;
use Omniship\Consts;
use ResponseQuote;
use Carbon\Carbon;

class ShippingQuoteResponse extends AbstractResponse
{

    /**
     * @return ShippingQuoteBag
     */
    public function getData()
    {
        $result = new ShippingQuoteBag();
        if(!is_null($this->getCode())) {
            return $result;
        }

        if(is_array($this->data)) {
            /** @var ResponseQuote $service */
            foreach($this->data AS $service) {
                $result->push([
                    'id' => $service->getId(),
                    'name' => $service->getName(),
                    'description' => null,
                    'price' => $service->getTOTAL(),
                    'pickup_date' => Carbon::now($this->request->getSenderTimeZone()),
                    'pickup_time' => Carbon::now($this->request->getSenderTimeZone()),
                    'delivery_date' => null,
                    'delivery_time' => null,
                    'currency' => 'BGN',//@todo return price in BGN
                    'tax' => $service->getDDS(),
                    'insurance' => $service->getZastrahovka(),
                    'cash_on_delivery' => $service->getNalPlatej(),
                    'exchange_rate' => null,
                    'payer' => $this->getRequest()->getPayer() ? : Consts::PAYER_SENDER,
                    'allowance_fixed_time_delivery' => null,
                    'allowance_cash_on_delivery' => null,
                    'allowance_insurance' => null
                ]);
            }
        }
        return $result;
    }

}