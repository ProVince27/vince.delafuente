<?php

namespace Icg\Database;

use Illuminate\Support\Facades\DB;

trait TableNextIdTrait {

    public static function nextId() {
        $table      = (new self)->getTable();
        $details    = DB::select(DB::raw("SHOW TABLE STATUS LIKE '$table'"));
        return $details[0]->Auto_increment;
    }
}