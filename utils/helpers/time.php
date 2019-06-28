<?php

/* get the current day name */
if (!function_exists('day_name')):
    function day_name($date = '1970-01-01 00:00:00') {
        $timestamp = strtotime($date);
        return date('l', $timestamp);
    }
endif;

if (!function_exists('getTimeFromDateTime')):
    function getTimeFromDateTime($date = '1970-01-01 00:00:00') {
        $dateStr = date_create($date);
        return date_format($dateStr, 'H:i:s');
    }
endif;

/**
 * [timeDefference time difference]
 * @param  [Datetime  format]     $start [dateo or time]
 * @param  [dateTime] $end        [description]
 * @param  boolean    $modifier   [remove the after|]
 * @return [string]   [difference of the datetime]
 */
if (!function_exists('time_ago')):
    function time_ago($start, $end, $modifier = true) {
        $start = Carbon::parse($start, 'UTC');
        $end   = Carbon::parse($end, 'UTC');
        return $end->diffForHumans($start, $modifier);
    }
endif;