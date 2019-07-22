<?php

namespace Icg\User\Helpers;

/**
 *  Check what field should be used when validating an account.
 */
class LoginField {

    public function retrieve($value) {
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return 'email';
        } elseif (filter_var($value, FILTER_VALIDATE_REGEXP, $this->phone())) {
            return 'phone';
        }
        return 'email';
    }

    protected function phone() {
        return [
            'options' => [
                "regexp" => '/^(09|\+639)\d{9}$/',
            ],
        ];
    }
}
