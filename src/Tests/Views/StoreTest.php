<?php
/**
 * Created by PhpStorm.
 * User: yasser
 * Date: 24/03/19
 * Time: 14:17
 */

namespace Yasser\LaravelDashboard\Tests\Views;


use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Yasser\LaravelDashboard\Kit\BrowserKitTesting;

class StoreTest extends BrowserKitTesting
{

    use DatabaseTransactions;

    public function testStorePageRender(){

        $this->withoutMiddleware();

        $this->withExceptionHandling();

        $visit = $this->get(route('dashboard.store.index'));

        $visit->see('Price');

        $visit->see("Product");

    }


    public function testPostStore(){

        $this->withExceptionHandling();

        $user = Auth::loginUsingId(1);

        $visit = $this->visit(route('dashboard.store.store'));

        $visit->type('Iphone 10', 'title')
            ->type('1032', 'price')
            ->type(new File(dirname(__DIR__).'/File/logo.png'),'file')
            ->press('Product');

    }

}
