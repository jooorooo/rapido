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
     * @param $loginParam $loginParam
     * @return false|ResultCourierService[]
     */
    public function getServices($loginParam);

    /**
     * Method to call the operation originally named getSubServices
     * Documentation : Този метод връща списък от време за изпълнение да дадена услуга
     * @param $loginParam $loginParam
     * @param integer $serviceId
     * @return false|ResultCourierService[]
     */
    public function getSubServices($loginParam, $serviceId);

    /**
     * Method to call the operation originally named getSoapCouriers
     * Documentation : Този метод връща списък на куриерите
     * @param $loginParam $loginParam
     * @return false|ResultCouriers[]
     */
    public function getCouriers($loginParam);

}