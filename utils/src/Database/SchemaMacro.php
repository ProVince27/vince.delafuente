<?php

namespace Icg\Database;

use Icg\Database\Schema\SchemaExtention;
use Illuminate\Support\Facades\Facade;

class SchemaMacro extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return SchemaExtention::class;
    }

}
