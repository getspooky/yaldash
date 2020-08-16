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

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use yal\laraveldash\Kit\BrowserKitTesting;

class SettingsTest extends BrowserKitTesting
{
    use DatabaseTransactions;

    public function testSettingsPageRender()
    {
        $this->withoutMiddleware();
        $this->withExceptionHandling();
        $visit = $this->get(route('dashboard.settings.index'));
        $visit->see('Account Details');
        $visit->see('Description');
        $visit->see('Subscribers');
    }

    public function testUpdateUserInformation()
    {
        $this->withExceptionHandling();
        Auth::loginUsingId(1);
        $this->visit(route('dashboard.settings.index'))
            ->type('Name Test', 'name')
            ->type('Last Name Test', 'LastName')
            ->type('Email Test', 'email')
            ->type(bcrypt('Test Password'), 'password')
            ->type('Address Test', 'Address')
            ->type('City Test', 'City')
            ->type('Morocco', 'Country')
            ->type(3232, 'Zip')
            ->type(str_random(50), 'Description')
            ->press('Update Account');
    }
}
