<?php

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Limit the number of words in a string.
 *
 * @param  string   $value
 * @param  int      $words
 * @param  string   $end
 * @return string
 */
if (!function_exists('words_limit')) {
    function words_limit($value, $words = 100, $end = '...') {
        return Str::words($value, $words, $end);
    }
}

if (!function_exists('production')):
    function dev_mode() {
        return App::environment() == 'local';
    }
endif;

if (!function_exists('inConsole')):
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