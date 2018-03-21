<?php

namespace Rapido;

/**
 * Speedy EPS Service Interface.
 * This interface should be implemented by all specific protocol class implementations (SOAP, REST, etc.)
 */
interface EPSInterface {

    /**
     * Method to call the operation originally named getServices
     * Documentation : Този метод връща списък от предлагани услуги
     * @param $loginParam $_loginparam
     * @return array
     */
    public function getServices($loginParam);

    /**
     * Method to call the operation originally named getSubServices
     * Documentation : Този метод връща списък от време за изпълнение да дадена услуга
     * @param $loginParam $_loginparam
     * @param integer $_serviceId
     * @return array
     */
    public function getSubServices($loginParam, $_serviceId);

}