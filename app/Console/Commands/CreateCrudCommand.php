<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class CreateCrudCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Model and whole crud system of the given table name';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (Schema::hasTable($this->argument('name'))) {
            $input = preg_replace("/[^a-zA-Z]+/", "", $this->argument('name'));
            $model_name = ucfirst($input);
            Artisan::call('make:model ' . $model_name);
            $file = fopen('../../../app/Models/' . $model_name.'.php', 'w');
            fwrite($file,'Hashir');
            fclose($file);
        } else
            $this->info('Table does not exists in database');
    }
}
