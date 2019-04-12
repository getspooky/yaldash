<?php

namespace Yasser\LaravelDashboard\Controllers;

use App\User;
use Yasser\LaravelDashboard\Events\NotificationEvent;
use Yasser\LaravelDashboard\Models\Followers;
use Yasser\LaravelDashboard\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yasser\LaravelDashboard\Models\Store;

class LaravelManageController extends Controller
{
    //

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
     * @return Response
     */

    public function index(){

        return view('LaravelDashboard::manage');

     }

     /**
      * Return Json User and Post data
      *
      * @return JsonResponse
      */

     public function Response(){

         $userPost = User::find(auth()->id())->posts()->orderBy('id','desc')->get();

         $userProduct = User::find(auth()->id())->store()->get();

         return response()->json([
             "status" => 200,
             "posts" => $userPost,
             "products" => $userProduct
         ]);

     }

     /**
      * Destroy Post
      * @param $id
      * @param $type
      * @return Response
      */

      public function Delete($id,$type){

          $type == "posts" ? Post::destroy([$id]) : Store::destroy([$id]);

          event(new NotificationEvent(["message"=>"Your request has been completed",'type'=>'manage','name'=>auth()->user()->name,'to'=>'auth']));

          return response()->json([
              'success'=>"Your request has been completed",
          ]);


      }





}
