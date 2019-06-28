<?php

namespace Icg\Console\Commands;

use Illuminate\Console\Command;

class CreateView extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:view';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create view path base on the folder structure of icg';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
                
    }
}
