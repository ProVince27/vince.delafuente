<?php

namespace Icg\Database\Field;

use Illuminate\Support\Facades\Facade;

class LoginField extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return MatchField::class;
    }
}
