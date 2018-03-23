<?php

namespace Rapido\Response;

/**
 * File for class AbstractResponse
 * @package Rapido
 * @subpackage Response
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */

use JsonSerializable;
use ReflectionClass;

/**
 * This class stands for AbstractResponse originally named AbstractResponse
 * @package Rapido
 * @subpackage Response
 * @author Georgi Nachev <jooorooo@gmail.com>
 * @version 20150429-01
 * @date 2018-03-09
 */
abstract class AbstractResponse implements JsonSerializable
{

    /**
     * The cache of snake-cased words.
     *
     * @var array
     */
    protected static $snakeCache = [];

    /**
     * @return array
     */
    public function toArray() {
        $reflection = new ReflectionClass($this);
        $return = [];
        foreach($reflection->getProperties() AS $property) {
            $value = $this->{$property->getName()};
            if(is_object($value) && method_exists($value, 'toArray')) {
                $value = $value->toArray();
            } else if(is_array($value)) {
                $tmp = [];
                foreach ($value AS $key => $v) {
                    $tmp[$key] = is_object($v) && method_exists($v, 'toArray') ? $v->toArray() : $v;
                }
                $value = $tmp;
            }
            $return[substr(static::snake($property->getName()), 1)] = $value;

        }
        return $return;
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return array_map(function ($value) {
            if ($value instanceof JsonSerializable) {
                return $value->jsonSerialize();
            } elseif (is_object($value) && method_exists($value, 'toArray')) {
                return $value->toArray();
            } else {
                return $value;
            }
        }, $this->toArray());
    }

    /**
     * Get the collection of items as JSON.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->jsonSerialize(), $options);
    }

    /**
     * Convert a string to snake case.
     *
     * @param  string  $value
     * @param  string  $delimiter
     * @return string
     */
    protected static function snake($value, $delimiter = '_')
    {
        $key = $value;

        if (isset(static::$snakeCache[$key][$delimiter])) {
            return static::$snakeCache[$key][$delimiter];
        }

        if (! ctype_lower($value)) {
            $value = preg_replace('/\s+/u', '', $value);

            $value = static::lower(preg_replace('/(.)(?=[A-Z])/u', '$1'.$delimiter, $value));
        }

        return static::$snakeCache[$key][$delimiter] = $value;
    }
    /**
     * Convert the given string to lower-case.
     *
     * @param  string  $value
     * @return string
     */
    protected static function lower($value)
    {
        return mb_strtolower($value, 'UTF-8');
    }

}