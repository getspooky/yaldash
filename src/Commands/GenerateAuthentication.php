<?php
/*
 * This file is part of the laravelDash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LaravelDashboard\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateAuthentication extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var $signature
     * @types {String}
     */
    protected $signature = 'LaravelDash:auth ';

    /**
     * The console command description.
     *
     * @var $description
     * @types {String}
     */
    protected $description = 'Generate Simple and Easy LaravelDash Login Authentication';

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
     * @function
     * @return mixed
     */
    public function handle()
    {
      try {
        $auth_folder =  dirname(__DIR__).'../resources/views/auth';
           if ($this->confirm('Do you want to use LaravelDash authentication ?')) {
             if (File::exists(resource_path('views/auth'))) {
               File::copyDirectory($auth_folder, resource_path('views/auth'));
             } else {
               $this->error('Auth folder not found');
             }
           }
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
