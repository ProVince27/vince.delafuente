<?php

use Carbon\Carbon;

/* custom
date = date to be converted
offset = timezone offset used
 */
if (!function_exists('convertDatetimeToUTC')):
    function convertDatetimeToUTC($date = '1970-01-01 00:00:00', $timeOffset = -480) {
        if (!is_numeric($timeOffset)) {
            $timeOffset = -480;
        }

        $real_datetime = new Carbon($date);
        $real_datetime->addMinutes($timeOffset * 1);

        return $real_datetime;
    }
endif;

if (!function_exists('getTimeFromDateTime')):
    function getTimeFromDateTime($date = '1970-01-01 00:00:00') {
        $dateStr = date_create($date);
        return date_format($dateStr, 'H:i:s');
    }
endif;

/**
 * extract a property of an object use for sidemenu
 */
if (!function_exists('hasItemKey')):
    function hasItemKey($object, $key = "items") {
        return keyExtractor($object, $key);
    }
endif;

/**
 * extract a specific key of an array|object
 */
if (!function_exists('keyExtractor')):
    function keyExtractor($item, $key = null) {
        if (is_array($item) && isset($item[$key])) {
            return $item[$key];
        }
        if (is_object($item) && isset($item->{$key})) {
            return $item->{$key};
        }
    }
endif;

if (!function_exists('dateTimeFormat')):
    function dateTimeFormat($dateTime, $format = 'Y-m-d H:i:s', $tz = "UTC") {
        return Carbon::parse($dateTime, $tz)->setTimezone($tz)->format($format);
    }
endif;

/**
 * Check if an Object or array hasKey of an item
 *
 * @param [Array|Object] $property
 * @param [String] $key
 * @return boolean
 */
if (!function_exists('hasKey')):
    function hasKey($property, $key) {
        if (is_object($property)) {
            return property_exists($property, $key);
        }
        return array_key_exists($key, $property);
    }
endif;

if (!function_exists('json_checker')):
    function is_json($string, $return_data = false) {
        $data = json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE) ? ($return_data ? $data : TRUE) : FALSE;
    }
endif;

if (!function_exists('has_key_index')):
    function has_key_index($lists, $key, $alter) {
        return isset($lists[$key]) ? $lists[$key] : $lists[$alter];
    }
endif;

if (!function_exists('vd')):
    function vd($value) {
        return var_dump($value);
    }
endif;
