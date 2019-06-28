<?php

namespace Icg\Database;

use Icg\Database\Schema\Blueprint;
use Illuminate\Database\MySqlConnection as ParentMySqlConnection;
use Illuminate\Database\Schema\MySqlBuilder;

/**
 * Class MySqlConnection
 *
 * @package App\Database
 */
class MySqlConnection extends ParentMySqlConnection {

    /**
     * Get a schema builder instance for the connection.
     * Set {@see \App\Database\Schema\Blueprint} for connection
     * Blueprint resolver
     *
     * @return \Illuminate\Database\Schema\MySqlBuilder
     */
    public function getSchemaBuilder() {
        if (is_null($this->schemaGrammar)) {
            $this->useDefaultSchemaGrammar();
        }
        $builder = new MySqlBuilder($this);
        $builder->blueprintResolver(function ($table, $callback) {
            return new Blueprint($table, $callback);
        });
        return $builder;
    }
}