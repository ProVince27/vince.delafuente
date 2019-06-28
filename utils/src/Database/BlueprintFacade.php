<?php

namespace Icg\Database;

use Icg\Schema\Blueprint;
use Illuminate\Support\Facades\Facade;

class BlueprintFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return Blueprint::class;
    }
}
