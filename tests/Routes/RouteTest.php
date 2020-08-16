<?php
/*
 * This file is part of the laravelDash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LaravelDashboard\Tests\Routes;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class RouteTest extends TestCase
{
    public function testGetRoute()
    {
        $user = Auth::loginUsingId(1);
        $routes = [
           route('dashboard.home'),
           route('dashboard.settings.index'),
           route('dashboard.manage.index'),
           route('dashboard.manage.jsonData'),
           route('dashboard.users'),
           route('dashboard.checkout.index'),
           route('dashboard.store.index'),
           route('dashboard.views.state')
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);

            $this->assertEquals(200, $response->status(), $route.' did not return 200');
        }
    }
}
