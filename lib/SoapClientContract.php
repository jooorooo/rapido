<?php

namespace Rapido;

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
 * @method array cancellTovaritelnica($_loginparam,$_tovaritelnica)
 * @method array checkOrders($_loginparam,$_nomera)
 * @method array checkCityFixChas($_loginparam,$_siteid)
 * @method array check_siteid($_loginparam,$_siteid)
 * @method array create_order($_loginparam,$_order_info)
 * @method array enrollOrders($_loginparam,$_nomera,$_curier)
 * @method array listSites($_loginparam,$_name,$_country)
 * @method array print_int_pdf($_loginparam,$_nomer)
 * @method array print_pdf($_loginparam,$_nomer,$_pdfformat)
 * @method array requestCurier($_loginparam,$_broi,$_teglo,$_readiness,$_sendoffice)
 * @method array setPrintSettings($_loginparam,$_settings)
 * @method array track_order($_loginparam,$_nomer)
 * @method array track_order_array($_loginparam,$_tarray)
 * @method array track_order_ref($_loginparam,$_nomer)
 * @method array track_order_ref_array($_loginparam,$_tarray)
 * @method array track_request($_loginparam,$_nomer)
 */
interface SoapClientContract
{

}