<?php
/*
 * This file is part of the laravelDash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace yal\laraveldash\Tests\Views;

use Illuminate\Support\Facades\Auth;
use yal\laraveldash\Kit\BrowserKitTesting;

class UsersTest extends BrowserKitTesting
{
    public function testUsersPageRender()
    {
        $this->withoutMiddleware();
        $this->withExceptionHandling();
        $visit = $this->get(route('dashboard.users'));
        $visit->see('Mrs. Kaylee Sauer Sr.');
        $visit->see('Active User ');
    }
}
