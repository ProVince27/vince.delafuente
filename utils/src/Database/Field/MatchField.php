<?php

namespace Icg\Database\Field;

/**
 *  Check what field should be used when validating an account.
 */
class MatchField {

    public function retrieve($value) : string {
        if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return 'email';
        } elseif (filter_var($value, FILTER_VALIDATE_REGEXP, $this->phone())) {
            return 'phone';
        }
        return 'username';
    }

    protected function phone() {
        return [
            'options' => [
                "regexp" => '/^(09|\+639)\d{9}$/',
            ],
        ];
    }

}
