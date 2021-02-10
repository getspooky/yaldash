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

use App\Http\Controllers\Controller;
use yal\laraveldash\Events\NotificationEvent;
use yal\laraveldash\Models\Post;
use yal\laraveldash\Models\Store;

class ManageController extends Controller
{

    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index()
    {
        return view('laravelDash::manage');
    }

    public function Response()
    {
        $userPost = auth()->user()->posts()->orderBy('id', 'desc')->get();
        $userProduct = auth()->user()->store()->get();
        return response()->json([
             'status' => 200,
             'posts' => $userPost,
             'products' => $userProduct
         ]);
    }

    public function Delete($id, $type)
    {
        $type == "posts" ? Post::destroy([$id]) : Store::destroy([$id]);
        event(new NotificationEvent(
          [
            'message' => 'Your request has been completed',
            'type' => 'manage',
            'name' => auth()->user()->name,
            'to' => 'auth'
          ]));
        return response()->json([
              'success'=>"Your request has been completed",
          ]);
    }
}
