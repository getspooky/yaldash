<?php
/*
 * This file is part of the laravelDash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace yal\laraveldash\Tests\Models;

use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use yal\laraveldash\Models\Store;

class StoreTest extends TestCase
{
    public function testCanCreateStore()
    {
        Auth::loginUsingId(1);
        $store = new Store();
        $store->fill([
            'user_id' => 1,
            'title' => 'Test Tile',
            'price' => 10,
        ]);
        $store->save();
        $this->assertEquals(1, $store->id);
        $this->assertEquals('Test Tile', $store->title);
        $this->assertEquals(10, $store->price);
    }
}
