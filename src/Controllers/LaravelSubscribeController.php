<?php
/**
 * Created by PhpStorm.
 * User: yasser
 * Date: 27/02/19
 * Time: 08:52
 */

namespace Yasser\LaravelDashboard\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yasser\LaravelDashboard\Helper\Helper;
use Yasser\LaravelDashboard\Models\Followers;
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
        $users = User::all(); // get all users

        return view('LaravelDashboard::users', compact('users'));
    }


    /**
     * Create user followers relationShips
     * @param $request
     * @return RedirectResponse
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
            return response()->json(["error"=>$e->getMessage(), "code" => $e->getCode()]);
        }
    }
}
