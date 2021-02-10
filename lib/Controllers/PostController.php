<?php
/*
 * This file is part of the yaldash  package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace yal\laraveldash\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use yal\laraveldash\Events\NotificationEvent;
use yal\laraveldash\Models\Post;

class PostController extends Controller
{

  public function __construct()
  {
    $this->middleware(['web', 'auth']);
  }

  public function index()
  {
    $post = Post::all();
    return view('laravelDash::posts.display-posts', compact('post'));
  }

  public function create()
  {
    return view('laravelDash::posts.post');
  }

  public function store(Request $request)
  {
    try {
      Validator::make($request->all(), [
        "title" => "required|string|max:200",
        "content" => "required|string|min:90",
        "summary" => "required|string|min:30|max:250"
      ])->validate();

      $create_post = auth()->user()->posts()->create([
        "title" => $request->get("title"),
        "content" => $request->get("content"),
        "summary" => $request->get('summary')
      ]);

      if ($create_post) {
        $create_post->categories()->create([
          "categories" => $request->get('categories')
        ]);

        event(new NotificationEvent([
          'message' => 'has published a new Post',
          'type' => 'post',
          'name' => auth()->user()->name,
          'to' => 'auth'
        ]));

        return response()->json([
          'success' => 'data was inserted successfully',
        ]);
      }
    } catch (Exception $e) {
      return response()->json(["error" => $e->getMessage(), "code" => $e->getCode()]);
    }
  }

  public function show($id)
  {
    $post = Post::find($id);
    if (!is_null($post)) {
      return view('laravelDash::posts.post-show', compact('post'));
    }
  }

  public function edit($id)
  {
    //
  }

  public function update(Request $request, $id)
  {
    //
  }

  public function destroy($id)
  {
    Post::destroy([$id]);
    return redirect()->route("post.index");
  }

  public function DevicesStore($id)
  {
    $device = null;

    if (preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])) {
      $device = 'mobile';
    } else {
      $device = 'laptop';
    }

    Post::find($id)->devices()->create([
      "user_device_information" => $device
    ]);

    return redirect()->route('post.show', ['id' => $id]);
  }
}
