<?php
/*
 * This file is part of the yaldash  package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace yal\laraveldash\Controllers;

use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use yal\laraveldash\Helper\Helper;

class SubscribeController extends Controller
{

  public function __construct()
  {
    $this->middleware(['web', 'auth']);
  }

  public function index()
  {
    $users = config('auth.providers.users.model', App\Models\User::class)::all();
    return view('laravelDash::users.users', compact('users'));
  }

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
        "error" => $e->getMessage(),
        "code" => $e->getCode()
      ]);

    }
  }
}
