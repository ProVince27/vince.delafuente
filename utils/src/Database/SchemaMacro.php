<?php

namespace Icg\Database;

use DB;
use Icg\Database\Schema\Blueprint;

class SchemaMacro {

    public static function build() {
        $schema = DB::getSchemaBuilder();

        $schema->blueprintResolver(function ($table, $callback) {
            return new Blueprint($table, $callback);
        });
        
        return $schema;
    }

}