<?php

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

if (!function_exists('dev_mode')):
    function dev_mode() {
        return App::environment() == 'local';
    }
endif;

if (!function_exists('in_console')):
    function in_console() {
        return app()->runningInConsole();
    }
endif;

if (!function_exists('generate_code')):
    function generate_code($code, $length = 5, $format = 0, $pad_right = 0) {
        return sprintf("%s%s", $pad_right, str_pad($code, $length, $format, STR_PAD_LEFT));
    }
endif;

/**
 * Attach requested params in pagination
 */
if (!function_exists('request_paginate')):
    function request_paginate(LengthAwarePaginator $data) {
        $request = collect(request()->all())->map(function ($item) {
            return is_null($item) ? 1 : $item;
        })->toArray();
        return $data->appends($request)->render();
    }
endif;

if (!function_exists('log_path')):
    function log_path($data, $location, $filename = null, $type = 'info') {
        $filename = is_null($filename) ? $currentDate = Carbon::now()->format('Y-m-d') : $filename;
        $file     = storage_path($location) . "/{$filename}.log";
        Log::useFiles($file);
        Log::info($data);
    }
endif;

/* check if the required array keys is available in the attributes */
if (!function_exists('array_dimension_check')):
    function array_dimension_check(array $required, array $attributes) {
        return count(array_intersect_key(array_flip($required), $attributes)) !== count($attributes);
    }
endif;

if (!function_exists('array_check_contains')):
    function array_check_contains(array $required, array $attributes) {
        return count(array_intersect_key(
            array_flip($required), $attributes)
        ) > 0;
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
 * Check if an Object or array has key
 * @param [Array|Object] $property
 * @param [String] $key
 * @return boolean
 */
if (!function_exists('hasKey')):
    function hasKey($property, $key) {
        return is_object($property) ? property_exists($property, $key) : array_key_exists($key, $property);
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

