<?php
/**
 * Created by PhpStorm.
 * User: joro
 * Date: 10.5.2017 г.
 * Time: 16:55 ч.
 */

namespace Omniship\Rapido\Http;

use Omniship\Common\PieceBag;
use Omniship\Consts;
use Omniship\Rapido\Helper\Convert;
use ParamCalculation;
use Carbon\Carbon;

class ShippingQuoteRequest extends AbstractRequest
{

    /**
     * @return ParamCalculation
     */
    public function getData()
    {
        $myPriceArray = array();
        $myPriceArray['service']=1; // Ползва се getServices за да се видят ID-тата на услугите. В примера 1 е "бързи градски"
        $myPriceArray['subservice']=18; // Ползва се getSubServices за да се видят ID-тата на  подуслугите (време за изпълнение). В примера 18 е "48 часа икономична"
        $myPriceArray['fix_chas']=0; // 0 или 1 (Съответно ако е 1 ще се ползва фиксиран час, а ако е 0 няма да е със фиксиран час.
        $myPriceArray['return_receipt']=0; // 0 или 1 (Съответно ако е 1 ще се иска обратна разписка, и 0 за без
        $myPriceArray['return_doc']=0; // 0 или 1 (Съответно ако е 1 ще има обратни документи, и 0 за без
        $myPriceArray['nal_platej']=50; // Сума за наложен платеж. Оставя се 0 ако е без наложен платеж. За десетичната запетая се използва символа точка "."
        $myPriceArray['zastrahovka']=50; // Сума за застраховка. Оставя се 0 ако е без застраховка. За десетичната запетая се използва символа точка "."
        $myPriceArray['teglo']=2.5; // Тегло. За десетичната запетая се използва символа точка "."
        $myPriceArray['country_b']=100; // ID на държава(по ISO). Подава се само ако е международна пратка.

        return $myPriceArray;
    }

    public function sendData($data)
    {
        $response = $this->getClient()->calculate($data, $this->getAllowedServices());
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