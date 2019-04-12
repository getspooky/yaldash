<?php


namespace Yasser\LaravelDashboard\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class LaravelSellController extends Controller
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
     * @return Response
     */

    public function index()
    {
        //

        return view('LaravelDashboard::sell');

    }





}
