<?php
/**
 * Created by PhpStorm.
 * User: yasser
 * Date: 23/03/19
 * Time: 23:06
 */

namespace Yasser\Tests\Views;

use Illuminate\Support\Facades\Auth;
use Yasser\LaravelDashboard\Kit\BrowserKitTesting;

class DashboardTest extends BrowserKitTesting
{


    public function testDashboardPageRender()
    {

        $this->withExceptionHandling();

        $user = Auth::loginUsingId(1);

        $visit = $this->get(route('dashboard.home'));

        $visit->see('VIEWS');

        $visit->see('SUBSCRIBERS');

        $visit->see('Posts');

    }


    public function testNavigateOtherPage()
    {

        $this->withExceptionHandling();

        $user = Auth::loginUsingId(1);

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
