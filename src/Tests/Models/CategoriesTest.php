<?php
/**
 * Created by PhpStorm.
 * User: yasser
 * Date: 22/03/19
 * Time: 19:35
 */

namespace Yasser\Tests\Models;


use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Yasser\LaravelDashboard\Models\Categories;
use Yasser\LaravelDashboard\Models\Post;

class CategoriesTest extends TestCase
{

    public function testCanCreateCategoriesRelatedPost(){

        $user = Auth::loginUsingId(1);

        $categories = new Categories();

        $categories->fill([

            'post_id' => 1,
            'categories' => 'Test categories',

        ]);

        $categories->save();

        $this->assertEquals(2,$categories->id);

        $this->assertEquals('Test categories',$categories->categories);



    }


    public function testPostHasCategories(){

        $post = Post::first();

        $post_categorie = $post->categories->id;

        $this->assertNotNull($post_categorie);

    }


}
