<?php

use Icg\Support\ResponseApiService;

/* resolve the response */

if (!function_exists('resolve_response')):
    function resolve_response($message = null, $data = null, $statusCode = 200) {
        return (new ResponseApiService)->resolve($message, $data, $statusCode);
    }
endif;

if (!function_exists('reject_response')):
    function reject_response($message = null, $data = null, $statusCode = null) {
        return (new ResponseApiService)->reject($message, $data, $statusCode);
    }
endif;
