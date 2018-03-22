<?php

/**
 * Created by PhpStorm.
 * User: joro
 * Date: 22.3.2018 г.
 * Time: 12:34 ч.
 */

/**
 * @property $__default_headers
 * @property $_stream_context
 * @method __setSoapHeaders($headers)
 * @method array getServices($_loginparam)
 * @method array getSubServices($_loginparam, $service_id)
 * @method array getSoapCouriers($_loginparam)
 * @method array getCountries($_loginparam)
 * @method array getCityes($_loginparam,$_country,$_start,$_count)
 * @method array getStreets($_loginparam,$_siteid,$_start,$_count)
 * @method array getMyObjectInfo($_loginparam,$_sendoffice)
 * @method array getMyObjects($_loginparam)
 * @method array getOfficesCity($_loginparam,$_siteid)
 * @method array getRazhodOrderInfo($_loginparam,$_orderid)
 * @method array getRazhodOrderInfoPMT($_loginparam,$_orderid)
 * @method array getNPInfo($_loginparam,$_tid)
 * @method array getTovarInfo($_loginparam,$_tid)
 * @method array getTovarCurrencyInfo($_loginparam,$_tid)
 * @method array getTovarInfoTid($_loginparam,$_tid)
 * @method array getTurnover($_loginparam,$_id,$_pass,$_start,$_end)
 * @method array getReturnRedirect($_loginparam,$_start,$_end)
 * @method array getRazhodOrders($_loginparam,$_start,$_end)
 * @method array getPrietivOfis($_loginparam,$_start,$_end)
 * @method array getInvoiceType($_loginparam)
 * @method array getInvoices($_loginparam,$_start,$_end)
 * @method array calculate($_loginparam,$_calculation)
 */
interface SoapClientContract
{

}