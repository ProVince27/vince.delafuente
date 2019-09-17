<?php

use App\Models\System\Configuration;
use Illuminate\Database\Seeder;

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

        Configuration::create([
            'name'         => 'app.mail',
            'display_name' => 'Mail Server',
            'description'  => 'Setup the mail server configuration',
            'group'        => 'app.detail',
            'payload'      => collect([
                'MAIL_DRIVER'     => 'smtp',
                'MAIL_HOST'       => 'smtp.mailtrap.io',
                'MAIL_PORT'       => '2525',
                'MAIL_USERNAME'   => 'null',
                'MAIL_PASSWORD'   => 'null',
                'MAIL_ENCRYPTION' => 'null',
            ])->toJson(),
        ]);
    }
}
