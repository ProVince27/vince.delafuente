<?php

namespace Icg\Authentication\Facades;

use Illuminate\Support\Facades\Facade;
use Icg\Authentication\Helpers\LoginField as LoginFieldClass;
use Icg\Services\Helpers\LoginFieldHelper;

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
