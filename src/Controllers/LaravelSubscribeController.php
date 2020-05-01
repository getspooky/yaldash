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

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Yasser\LaravelDashboard\Helper\Helper;
use Exception;

class LaravelSubscribeController extends Controller
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
     * Show the application views.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();

        return view('LaravelDashboard::users', compact('users'));
    }


    /**
     * Create user followers relationShips
     *
     * @param $request
     * @return mixed
     */
    public function store(Request $request)
    {
        try {
            $subscribe = auth()->user()->followers();

            if (Helper::already_subscribe($request->get('follow_id'))) {
                $subscribe->create([
                     "follow_id" => $request->get('follow_id')
                 ]);
            } else {
                $subscribe->where('follow_id', $request->get('follow_id'))->delete();
            }

            return redirect()->route("dashboard.users");

        } catch (Exception $e) {

            return response()->json([
              "error"=>$e->getMessage(), "code" => $e->getCode()
            ]);

        }
    }
}
