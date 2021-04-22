<?php
/*
 * This file is part of the yaldash  package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace yal\laraveldash\Commands;

use Illuminate\Console\Command;
use yal\laraveldash\Providers\DashboardServiceProvider;

class LaravelDashInstall extends Command
{

  /**
   * The name and signature of the console command.
   *
   * @var $signature
   * @types {String}
   */
  protected $signature = 'laraveldash:install';

  /**
   * The console command description.
   *
   * @var $description
   */
  protected $description = 'Install the laraveldash package';

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
   * @return mixed
   */
  public function handle()
  {
    $this->info('Publishing the yaldash config file');
    $this->call('vendor:publish', ['--provider' => DashboardServiceProvider::class, '--tag' => 'laravelDash-config']);
    $this->info('Publishing the yaldash assets files');
    $this->call('vendor:publish', ['--provider' => DashboardServiceProvider::class, '--tag' => 'laravelDash-assets']);
    $this->info('Migrating the database tables into your application');
    $this->call('migrate');
    $this->info('Creating a symbolic link from "public/storage" to "storage/app/public"');
    $this->call('storage:link');
  }
}
