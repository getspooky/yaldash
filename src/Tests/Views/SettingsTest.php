<?php
/**
 * Created by PhpStorm.
 * User: yasser
 * Date: 25/03/19
 * Time: 16:45
 */

namespace Yasser\Tests\Views;


use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Yasser\LaravelDashboard\Kit\BrowserKitTesting;

class SettingsTest extends BrowserKitTesting
{

    use DatabaseTransactions;

    public function testSettingsPageRender(){

        $this->withoutMiddleware();

        $this->withExceptionHandling();

        $visit = $this->get(route('dashboard.settings.index'));

        $visit->see('Account Details');

        $visit->see('Description');

        $visit->see('Subscribers');

    }


    public function testUpdateUserInformation(){

        $this->withExceptionHandling();

        $user = Auth::loginUsingId(1);

        $this->visit(route('dashboard.settings.index'))
            ->type('Name Test','name')
            ->type('Last Name Test','LastName')
            ->type('Email Test','email')
            ->type(bcrypt('Test Password'),'password')
            ->type('Address Test','Address')
            ->type('City Test','City')
            ->type('Morocco','Country')
            ->type(3232,'Zip')
            ->type(str_random(50),'Description')
            ->press('Update Account');

    }


}
