<?php

namespace Icg\Support;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FormRequestService extends FormRequest {

    protected function reject(Validator $validator, $statusCode = 422) {
        return $this->failedValidation($validator, $statusCode);
    }

    protected function failedValidation(Validator $validator, $statusCode = 422) {
        $error = $this->isMobileRequest($validator);
        throw new HttpResponseException(response()->json([
            "status"   => false,
            "message"  => $error->first(),
            "messages" => $error->all(),
            "errors"   => $error,
        ], $statusCode));
    }

    private function isMobileRequest($validator) {
        // if (request()->headers->has('X-Request-Mode')) {
        //     return collect($validator->errors())->flatten(2)->all();
        // }
        return $validator->errors();
    }
}
