<?php

/*
 * This file is part of the laravelDash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LaravelDash\Tests\Views;

use Illuminate\Support\Facades\Auth;
use LaravelDashboard\Kit\BrowserKitTesting;

class PostTest extends BrowserKitTesting
{
    public function testPostPageRender()
    {
        $this->withoutMiddleware();
        $visit = $this->get(route('post.create'));
        $visit->see('Post Overview');
    }
}
