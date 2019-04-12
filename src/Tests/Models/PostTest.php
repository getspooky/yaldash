<?php
/**
 * Created by PhpStorm.
 * User: yasser
 * Date: 22/03/19
 * Time: 18:22
 */

namespace Yasser\Tests\Models;


use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Yasser\LaravelDashboard\Models\Post;

class PostTest extends TestCase
{

    public function testCanCreatePost(){

        $user = Auth::loginUsingId(1);

        $post = new Post();

        $post->fill([

            'user_id' => 1,
            'title' => 'Test Tile',
            'summary' => 'Test Summary',
            'content' => 'Test Content',
        ]);

        $post->save();

        $this->assertEquals(1,$post->id);

        $this->assertEquals('Test Tile',$post->title);

        $this->assertEquals('Test Summary',$post->summary);

        $this->assertEquals('Test Content',$post->content);


    }



}
