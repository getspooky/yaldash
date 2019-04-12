<?php
/**
 * Created by PhpStorm.
 * User: yasser
 * Date: 28/02/19
 * Time: 09:13
 */

namespace Yasser\LaravelDashboard\Controllers;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index(){

         return view("LaravelDashboard::checkout");
     }

    /**
     * @param Request $request
     * @return RedirectResponse
     */

     public function store(Request $request){

        User::find(auth()->id())->checkout()->create([
            'FirstName'=>$request->get('FirstName'),
            'LastName'=>$request->get('LastName'),
            'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),
            'address'=>implode(',',[
                $request->get('City'),$request->get('State'),$request->get('Zip'),$request->get('Country')
            ]),
            'Order_Notes'=>$request->get('Order_Notes'),
            'Price'=>123
        ]);

         return redirect()->route('checkout.index');

     }


}
