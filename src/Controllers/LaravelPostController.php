<?php

namespace Yasser\LaravelDashboard\Controllers;

use Illuminate\Support\Facades\Event;
use Yasser\LaravelDashboard\Events\NotificationEvent;
use Yasser\LaravelDashboard\Models\Devices;
use Yasser\LaravelDashboard\Models\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Exception;

class LaravelPostController extends Controller
{


    /**
     * @var array
     */

    private $result = [];

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
     * @return Response
     */

     public function index()
    {
        //

        $post = Post::all();

        return view('LaravelDashboard::display_posts',compact('post'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

     public function create()
     {
        //

        return view('LaravelDashboard::post');

     }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request  $request
     * @return Response
     */

      public function store(Request $request)
      {
        //

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

                // Create categories for the post

                $create_post->categories()->create([
                    "categories" => $request->get('categories')
                ]);

                event(new NotificationEvent(['message'=>'has published a new Post','type'=>'post','name'=>auth()->user()->name,'to'=>'auth']));

                return response()->json([
                    'success' => 'data was inserted successfully',
                ]);


            }

        }catch (Exception $e){

             return response()->json(["error"=>$e->getMessage(), "code" => $e->getCode()]);

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

      public function show($id)
      {
        //
          $post = Post::find($id);

          if(!is_null($post)){

              return view('LaravelDashboard::post_show',compact('post'));

          }

      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
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
     * @return Response
     */

     public function update(Request $request, $id)
     {
        //
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

      public function destroy($id)
      {
        //

        $destroy = Post::destroy([$id]);

        return redirect()->route("post.index");

       }

       /**
        * Save user devices
        * @param int $id
        * @return Devices
        */

       public function DevicesStore($id){

           $device = null;

           if(preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])){

               $device = 'mobile';

           }else{
               $device = 'laptop';
           }

           Post::find($id)->devices()->create([
               "user_device_information"=>$device
           ]);

           return redirect()->route('post.show',['id'=>$id]);

       }


}
