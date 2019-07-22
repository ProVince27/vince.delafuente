<?php

namespace Icg\User\Facades;

use Illuminate\Support\Facades\Facade;
use Icg\User\Helpers\LoginField as LoginFieldClass;

class LoginField extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return LoginFieldClass::class;
    }
}
