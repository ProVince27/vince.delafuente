<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model {

    protected $table = 'configurations';

    protected $fields = [
        'name',
        'display_name',
        'description',
        'group',
        'payload'
    ];

    

}
