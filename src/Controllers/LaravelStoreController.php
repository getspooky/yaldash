<?php
/**
 * Created by PhpStorm.
 * User: yasser
 * Date: 28/02/19
 * Time: 13:42
 */

namespace Yasser\LaravelDashboard\Controllers;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yasser\LaravelDashboard\Events\NotificationEvent;
use Exception;

class LaravelStoreController extends Controller
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
     * @return Response
     */

    public function index(){

        $store = User::find(auth()->id())->store()->orderBy('id','desc')->get();

        return view('LaravelDashboard::store',compact('store'));

    }

    /**
     * Store products
     * @param Request $request
     * @return RedirectResponse
     */

     public function store(Request $request){

        try {

            Validator::make($request->all(), [

                "price" => "required|integer",
                "description" => "required|string",
                "file_name" => "required"

            ])->validate();

            $store = User::find(auth()->id())->store()->create([
                'price' => $request->get('price'),
                'description' => $request->get('description'),
            ]);

            if ($store) {

                event(new NotificationEvent(['message' => 'your Product has been added successfully', 'type' => 'store', 'name' => auth()->user()->name, 'to' => 'auth']));

                /** @var  $generate_name * */

                $generate_name = str_random(16) . '.' . $request->file('file_name')->getClientOriginalExtension();

                $store->attachementStore()->create([
                    'file_name' => $generate_name,
                ]);

                // Store the image

                $store->attachementStore()->getRelated()->newInstance()
                    ->UploadFile(new File($request->file('file_name')), $generate_name);


            }

            return redirect()->route('dashboard.store.index');


        }catch (Exception $e){

            return response()->json(["error"=>$e->getMessage(), "code" => $e->getCode()]);


        }

     }

}
