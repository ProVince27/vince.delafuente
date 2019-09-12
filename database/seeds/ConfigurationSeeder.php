<?php

use Illuminate\Database\Seeder;
use App\Models\System\Configuration;

class ConfigurationSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
    
        Configuration::create([
            'name'         => 'app.name',
            'display_name' => 'App Name',
            'description'  => null,
            'group'        => 'app.detail',
            'payload'      => config('app.name'),
        ]);

        Configuration::create([
            'name'         => 'app.email',
            'display_name' => 'Email Address',
            'description'  => null,
            'group'        => 'app.detail',
            'payload'      => 'vince.delafuente027@gmail.com',
        ]);
    }
}
