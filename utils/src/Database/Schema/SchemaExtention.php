<?php

namespace Icg\Database\Schema;

use Illuminate\Database\Schema\Blueprint as BlueprintParent;
use Illuminate\Support\Facades\Schema;

/**
 * Class Blueprint
 *
 * @package Icg\Database\Schema
 */
class SchemaExtention {
    /**
     * Add created_by,updated_by,deleted_by and also timestamps
     *
     * @return void
     */
    public function modifiers(
        array $datetime = ['created_at', 'updated_at', 'deleted_at'],
        array $user = ['created_by', 'updated_by', 'deleted_by']
    ) {
        BlueprintParent::macro('modifiers', function (
            array $datetime = ['created_at', 'updated_at', 'deleted_at'],
            array $user = ['created_by', 'updated_by', 'deleted_by']) {

            foreach ($datetime as $field) {
                if (!Schema::hasColumn($this->getTable(), $field)) {
                    $this->timestamp($field, 0)->nullable();
                }
            }

            foreach ($user as $field) {
                if (!Schema::hasColumn($this->getTable(), $field)) {
                    $this->unsignedInteger($field)->nullable();
                }
            }
        });
    }

}