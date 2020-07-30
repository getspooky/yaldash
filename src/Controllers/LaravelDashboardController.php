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
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelDashboard\Mail\EmailSupport;
use LaravelDashboard\Traits\Assets;

class LaravelDashboardController extends Controller
{
    use Assets;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['web', 'auth'])->except(['Dashboard_assets']);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = auth()->user();
        $points = (int)($user->posts()->count()*4/1500);
        $earning = number_format(($points*10/1000), 2);
        $state = [
             "POST"     => $user->posts()->count(),
             "EARNINGS" => $earning,
             "POINTS"   => $points
         ];
        return view("LaravelDashboard::index", $state);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return mixed
     */
    public function store_draft(Request $request)
    {
        return redirect()->route('dashboard.home');
    }

    /**
     * Get the views state
     * @return \Illuminate\Http\JsonResponse
     */
    public function ViewsState()
    {
        $user = auth()->user()->devices();
        $laptop = $user->where('user_device_information', 'laptop')->count() + 1;
        $mobile = $user->where('user_device_information', 'mobile')->count();
        return response()->json([
               "laptop" => $laptop,
               "mobile" => $mobile
           ]);
    }
}
