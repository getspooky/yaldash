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

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use yal\laraveldash\Mail\EmailSupport;
use yal\laraveldash\Traits\Assets;

class DashboardController extends Controller
{
  use Assets;

  public function __construct()
  {
    $this->middleware(['web', 'auth'])->except(['Dashboard_assets']);
  }

  public function index()
  {
    $user = auth()->user();
    $points = (int)($user->posts()->count() * 4 / 1500);
    $earning = number_format(($points * 10 / 1000), 2);
    $state = [
      "POST" => $user->posts()->count(),
      "EARNINGS" => $earning,
      "POINTS" => $points
    ];
    return view("laravelDash::index", $state);
  }

  public function store_draft(Request $request)
  {
    return redirect()->route('dashboard.home');
  }

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
