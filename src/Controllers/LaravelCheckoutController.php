<?php
/**
 * Created by PhpStorm.
 * User: yasser
 * Date: 28/02/19
 * Time: 09:13
 */

namespace Yasser\LaravelDashboard\Controllers;


use App\Http\Controllers\Controller;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;
use Yasser\LaravelDashboard\Models\Buy;

class LaravelCheckoutController extends Controller
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
     * Show the application payment.
     *
     * @return Renderable
     */

     public function index(){

         $products = auth()->user()->buy;

         return view("LaravelDashboard::checkout",compact('products'));

     }

     /**
      *
      * @param Request $request
      * @return response
      */

     public function charges(Request $request){

        try{

            $charge = Stripe::charges()->create([
                'currency' => 'USD',
                'amount'   => $request->get('amount'),
                'source'=>$request->get('stripeToken')
            ]);

            return response()->json([
                'success'=>'Your payment has been successfully processed'
            ]);

        }catch (\Exception $exception){

            return response()->json([
                'error'=>$exception->getMessage(),
                'status'=>$exception->getCode(),
                'result'=>$request->get('stripeToken')
            ]);

        }

     }

}
