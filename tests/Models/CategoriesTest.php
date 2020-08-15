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
use yal\laraveldash\Models\Categories;
use yal\laraveldash\Models\Post;

class CategoriesTest extends TestCase
{
    public function testCanCreateCategoriesRelatedPost()
    {
        Auth::loginUsingId(1);
        $categories = new Categories();
        $categories->fill([
            'post_id' => 1,
            'categories' => 'Test categories',
        ]);
        $categories->save();
        $this->assertEquals(2, $categories->id);
        $this->assertEquals('Test categories', $categories->categories);
    }

    public function testPostHasCategories()
    {
        $post = Post::first();
        $post_categorie = $post->categories->id;
        $this->assertNotNull($post_categorie);
    }
}
