<?php
/**
 * Created by PhpStorm.
 * User: yasser
 * Date: 22/03/19
 * Time: 19:08
 */

namespace Yasser\Tests\Models;


use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Yasser\LaravelDashboard\Models\Store;


class StoreTest extends TestCase
{

    public function testCanCreateStore(){

        $user = Auth::loginUsingId(1);

        $store = new Store();

        $store->fill([
            'user_id' => 1,
            'title' => 'Test Tile',
            'price' => 10,
        ]);

        $store->save();

        $this->assertEquals(1,$store->id);

        $this->assertEquals('Test Tile',$store->title);

        $this->assertEquals(10,$store->price);

    }


}
