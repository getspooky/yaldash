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
use yal\laraveldash\Models\Post;

class PostTest extends TestCase
{
    public function testCanCreatePost()
    {
        Auth::loginUsingId(1);
        $post = new Post();
        $post->fill([
            'user_id' => 1,
            'title' => 'Test Tile',
            'summary' => 'Test Summary',
            'content' => 'Test Content',
        ]);
        $post->save();
        $this->assertEquals(1, $post->id);
        $this->assertEquals('Test Tile', $post->title);
        $this->assertEquals('Test Summary', $post->summary);
        $this->assertEquals('Test Content', $post->content);
    }
}
