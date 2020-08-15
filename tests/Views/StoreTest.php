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
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use yal\laraveldash\Kit\BrowserKitTesting;

class StoreTest extends BrowserKitTesting
{
    use DatabaseTransactions;

    public function testStorePageRender()
    {
        $this->withoutMiddleware();
        $this->withExceptionHandling();
        $visit = $this->get(route('dashboard.store.index'));
        $visit->see('Price');
        $visit->see("Product");
    }

    public function testPostStore()
    {
        $this->withExceptionHandling();
        Auth::loginUsingId(1);
        $visit = $this->visit(route('dashboard.store.store'));
        $visit->type('Iphone 10', 'title')
            ->type('1032', 'price')
            ->type(new File(dirname(__DIR__) . '/File/logo.png'), 'file')
            ->press('Product');
    }
}
