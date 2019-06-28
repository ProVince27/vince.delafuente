<?php

namespace Icg\Support;

trait ResponseApiTrait {

    public function resolve($message = null, $data = null, $statusCode = null) {
        return resolve(ResponseApiService::class)->resolve($message, $data, $statusCode);
    }

    public function reject($message = null, $data = null, $statusCode = null) {
        return resolve(ResponseApiService::class)->reject($message, $data, $statusCode);
    }
}
