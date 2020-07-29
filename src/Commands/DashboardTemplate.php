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
use  \Illuminate\Support\Facades\File;

class DashboardTemplate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var $signature
     * @types {String}
     */
    protected $signature = 'LaravelDash:resource {name}';

    /**
     * The console command description.
     *
     * @var $description
     * @types {String}
     */
    protected $description = 'Generate a new resource';

    /**
     * Create a new command instance.
     * @function
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
        $resource = resource_path('views/' . $this->argument('name') . '.blade.php');
        $stub = dirname(__DIR__) . '/resources/views/stubs/template.blade.php';
          if (!file_exists($resource)) {
            $content = str_replace('Template', ucfirst($this->argument('name')), file_get_contents($stub));
            File::put($resource, $content);
            $this->info("The file is created successfully");
          } else {
            $this->error('The file already exists!');
          }
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
