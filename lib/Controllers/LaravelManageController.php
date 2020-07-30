<?php
/*
 * This file is part of the laravelDash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LaravelDashboard\Controllers;

use App\User;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use LaravelDashboard\Events\NotificationEvent;
use LaravelDashboard\Models\Post;
use LaravelDashboard\Models\Store;

class LaravelManageController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    /**
     * Display a Manage index .
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('LaravelDashboard::manage');
    }

    /**
     * Return Json User and Post data
     *
     * @return JsonResponse
     */
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

    /**
     * Destroy Given Post.
     *
     * @param {String} $id
     * @param {Number} $type
     * @return JsonResponse
     */
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
