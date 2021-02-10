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

use App\Http\Controllers\Controller;

class SellController extends Controller
{

  public function __construct()
  {
    $this->middleware(['web', 'auth']);
  }

  public function index()
  {
    return view('laravelDash::sell');
  }
}
