<?php
/**
 * Created by PhpStorm.
 * User: yasser
 * Date: 25/03/19
 * Time: 17:45
 */

namespace Yasser\Tests\Views;


use Illuminate\Support\Facades\Auth;
use Yasser\LaravelDashboard\Kit\BrowserKitTesting;

class UsersTest extends BrowserKitTesting
{


    public function testUsersPageRender(){

        $this->withoutMiddleware();

        $this->withExceptionHandling();

        $visit = $this->get(route('dashboard.users'));

        $visit->see('Mrs. Kaylee Sauer Sr.');

        $visit->see('Active User ');

    }



}
