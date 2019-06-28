<?php

namespace Icg\Support;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\Resource;

/**
 * Generalize the response of the api
 */

class ResponseApiService {
    /**
     * {Array} - $message
     * {Object} - $data
     */
    public function resolve($message = null, $data = null, $statusCode = null) {

        $response["status"] = true;

        if (!is_null($message)) {
            $response["message"] = $message;
        }

        if ($data instanceof Resource
            || $data instanceof AnonymousResourceCollection
        ) {
            return $data
                ->additional($response)
                ->response()
                ->setStatusCode($this->statusCodePassed($statusCode));
        } elseif ($data instanceof JsonResource) {
            if (count($data->additional) > 0) {
                $response['meta'] = $data->additional;
            }
            $response['data'] = $data;
        } elseif (is_object($data) || is_array($data)) {
            $response['data'] = $data;
        }
        return $this->sendAsJson($response, $this->statusCodePassed($statusCode));
    }

    public function reject($message = null, $data = null, $statusCode = null) {
        $response           = [];
        $response["status"] = false;
        if (!is_null($message)) {
            $response["message"] = is_array($message) ? $message[0] : $message;
            $response["error"]   = is_array($message) ? $message : [$message];
        }
        if (is_object($data) || is_array($data)) {
            $response['data'] = $data;
        }
        return $this->sendAsJson(
            $response,
            $this->statusCodeFailed($statusCode)
        );
    }

    protected function statusCodePassed($statusCode) {
        return is_null($statusCode) ? 200 : $statusCode;
    }

    protected function statusCodeFailed($statusCode) {

        return is_null($statusCode) ? 404 : $statusCode;
    }

    protected function sendAsJson($response, $code) {
        $response["statusCode"] = $code;
        return response()->json($response, $code);
    }
}
