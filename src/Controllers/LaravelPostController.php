<?php
/*
 * This file is part of the laravelDash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Yasser\LaravelDashboard\Controllers;

use Yasser\LaravelDashboard\Events\NotificationEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yasser\LaravelDashboard\Models\Post;
use App\User;
use Exception;

class LaravelPostController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $post = Post::all();
        return view('LaravelDashboard::display_posts', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function create()
    {
        return view('LaravelDashboard::post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request  $request
     * @return \Illuminate\Http\JsonResponse
     */

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

                event(new NotificationEvent(['message'=>'has published a new Post','type'=>'post','name'=>auth()->user()->name,'to'=>'auth']));

                return response()->json([
                    'success' => 'data was inserted successfully',
                ]);

            }
        } catch (Exception $e) {
            return response()->json(["error"=>$e->getMessage(), "code" => $e->getCode()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function show($id)
    {
       $post = Post::find($id);

        if (!is_null($post)) {
            return view('LaravelDashboard::post_show', compact('post'));
        }
    }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return void
   */

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy($id)
    {
        Post::destroy([$id]);
        return redirect()->route("post.index");
    }

    /**
     * Save user devices
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
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
