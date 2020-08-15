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

class DashboardTest extends BrowserKitTesting
{
    public function testDashboardPageRender()
    {
        $this->withExceptionHandling();
        Auth::loginUsingId(1);
        $visit = $this->get(route('dashboard.home'));
        $visit->see('VIEWS');
        $visit->see('SUBSCRIBERS');
        $visit->see('Posts');
    }

    public function testNavigateOtherPage()
    {
        $this->withExceptionHandling();
        Auth::loginUsingId(1);
        $visit = $this->visit(route('dashboard.home'));
        $visit->click('Store')->seePageIs(route('dashboard.store.index'));
    }

    public function testCanSeeTheUsername()
    {
        $this->withExceptionHandling();
        $user = Auth::loginUsingId(1);
        $this->visit(route('dashboard.home'))
            ->seeInElement('span', $user->name);
    }
}
