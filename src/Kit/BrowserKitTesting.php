<?php
/**
 * Created by PhpStorm.
 * User: yasser
 * Date: 24/03/19
 * Time: 13:15
 */

namespace Yasser\LaravelDashboard\Kit;

use Laravel\BrowserKitTesting\TestCase as BaseTestCase;
use Tests\CreatesApplication;

abstract class BrowserKitTesting extends BaseTestCase
{
    use CreatesApplication;
}
