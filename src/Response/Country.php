<?php

namespace Rapido\Response;

/**
 * https://en.wikipedia.org/wiki/ISO_3166-1_numeric
 * File for class Country
 * @package Rapido
 * @subpackage Response
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */

/**
 * This class stands for Country originally named Country
 * @package Rapido
 * @subpackage Response
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
class Country extends AbstractResponse
{

    /**
     * Country ID
     * @var integer Signed 64-bit
     */
    protected $_id;

    /**
     * Country name
     * @var string
     */
    protected $_name;

    /**
     * Country iso2
     * @var string
     */
    protected $_iso2;

    /**
     * Constructs new instance of ResultCourierService
     * @param array $result
     */
    function __construct($result)
    {
        $this->_id = isset($result['COUNTRYID_ISO']) ? trim($result['COUNTRYID_ISO']) : null;
        $this->_name = isset($result['COUNTRYNAME']) ? trim($result['COUNTRYNAME']) : null;
        $this->_iso2 = $this->mapIso2($this->_id);
    }

    /**
     * Get courier service type ID
     * @return integer Signed 64-bit
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Get courier service name
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Get country iso2
     * @return string
     */
    public function getIso2()
    {
        return $this->_iso2;
    }

    /**
     * @return string|null
     */
    private function mapIso2($id)
    {
        $map = [4 => 'AF', 248 => 'AX', 8 => 'AL', 12 => 'DZ', 16 => 'AS', 20 => 'AD', 24 => 'AO', 660 => 'AI', 10 => 'AQ', 28 => 'AG', 32 => 'AR', 51 => 'AM', 533 => 'AW', 36 => 'AU', 40 => 'AT', 31 => 'AZ', 44 => 'BS', 48 => 'BH', 50 => 'BD', 52 => 'BB', 112 => 'BY', 56 => 'BE', 84 => 'BZ', 204 => 'BJ', 60 => 'BM', 64 => 'BT', 68 => 'BO', 70 => 'BA', 72 => 'BW', 74 => 'BV', 76 => 'BR', 86 => 'IO', 96 => 'BN', 100 => 'BG', 854 => 'BF', 108 => 'BI', 116 => 'KH', 120 => 'CM', 124 => 'CA', 132 => 'CV', 136 => 'KY', 140 => 'CF', 148 => 'TD', 152 => 'CL', 156 => 'CN', 162 => 'CX', 166 => 'CC', 170 => 'CO', 174 => 'KM', 178 => 'CG', 180 => 'CD', 184 => 'CK', 188 => 'CR', 384 => 'CI', 191 => 'HR', 192 => 'CU', 531 => 'CW', 196 => 'CY', 203 => 'CZ', 208 => 'DK', 262 => 'DJ', 212 => 'DM', 214 => 'DO', 218 => 'EC', 818 => 'EG', 222 => 'SV', 226 => 'GQ', 232 => 'ER', 233 => 'EE', 231 => 'ET', 238 => 'FK', 234 => 'FO', 242 => 'FJ', 246 => 'FI', 250 => 'FR', 254 => 'GF', 258 => 'PF', 260 => 'TF', 266 => 'GA', 270 => 'GM', 268 => 'GE', 276 => 'DE', 288 => 'GH', 292 => 'GI', 300 => 'GR', 304 => 'GL', 308 => 'GD', 312 => 'GP', 316 => 'GU', 320 => 'GT', 831 => 'GG', 324 => 'GN', 624 => 'GW', 328 => 'GY', 332 => 'HT', 334 => 'HM', 336 => 'VA', 340 => 'HN', 344 => 'HK', 348 => 'HU', 352 => 'IS', 356 => 'IN', 360 => 'ID', 364 => 'IR', 368 => 'IQ', 372 => 'IE', 833 => 'IM', 376 => 'IL', 380 => 'IT', 388 => 'JM', 392 => 'JP', 832 => 'JE', 400 => 'JO', 398 => 'KZ', 404 => 'KE', 296 => 'KI', 408 => 'KP', 410 => 'KR', 414 => 'KW', 417 => 'KG', 418 => 'LA', 428 => 'LV', 422 => 'LB', 426 => 'LS', 430 => 'LR', 434 => 'LY', 438 => 'LI', 440 => 'LT', 442 => 'LU', 446 => 'MO', 807 => 'MK', 450 => 'MG', 454 => 'MW', 458 => 'MY', 462 => 'MV', 466 => 'ML', 470 => 'MT', 584 => 'MH', 474 => 'MQ', 478 => 'MR', 480 => 'MU', 175 => 'YT', 484 => 'MX', 583 => 'FM', 498 => 'MD', 492 => 'MC', 496 => 'MN', 499 => 'ME', 500 => 'MS', 504 => 'MA', 508 => 'MZ', 104 => 'MM', 516 => 'NA', 520 => 'NR', 524 => 'NP', 528 => 'NL', 540 => 'NC', 554 => 'NZ', 558 => 'NI', 562 => 'NE', 566 => 'NG', 570 => 'NU', 574 => 'NF', 580 => 'MP', 578 => 'NO', 512 => 'OM', 586 => 'PK', 585 => 'PW', 591 => 'PA', 598 => 'PG', 600 => 'PY', 604 => 'PE', 608 => 'PH', 612 => 'PN', 616 => 'PL', 620 => 'PT', 630 => 'PR', 634 => 'QA', 638 => 'RE', 642 => 'RO', 643 => 'RU', 646 => 'RW', 652 => 'BL', 659 => 'KN', 662 => 'LC', 663 => 'MF', 666 => 'PM', 670 => 'VC', 882 => 'WS', 674 => 'SM', 678 => 'ST', 682 => 'SA', 686 => 'SN', 688 => 'RS', 690 => 'SC', 694 => 'SL', 702 => 'SG', 534 => 'SX', 703 => 'SK', 705 => 'SI', 90 => 'SB', 706 => 'SO', 710 => 'ZA', 239 => 'GS', 728 => 'SS', 724 => 'ES', 144 => 'LK', 729 => 'SD', 740 => 'SR', 744 => 'SJ', 748 => 'SZ', 752 => 'SE', 756 => 'CH', 760 => 'SY', 762 => 'TJ', 764 => 'TH', 626 => 'TL', 768 => 'TG', 772 => 'TK', 776 => 'TO', 780 => 'TT', 788 => 'TN', 792 => 'TR', 795 => 'TM', 796 => 'TC', 798 => 'TV', 800 => 'UG', 804 => 'UA', 784 => 'AE', 826 => 'GB', 840 => 'US', 581 => 'UM', 858 => 'UY', 860 => 'UZ', 548 => 'VU', 862 => 'VE', 704 => 'VN', 92 => 'VG', 850 => 'VI', 876 => 'WF', 732 => 'EH', 887 => 'YE', 894 => 'ZM', 716 => 'ZW'];
        return isset($map[$id]) ? $map[$id] : null;
    }

}