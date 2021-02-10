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
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

  public function __construct()
  {
    $this->middleware(['web', 'auth']);
  }

  public function index()
  {
    $products = auth()->user()->buy;
    return view("laravelDash::checkout", compact('products'));
  }

  public function charges(Request $request)
  {
    try {

      $charge = Stripe::charges()->create([
        'currency' => 'USD',
        'amount' => $request->get('amount'),
        'source' => $request->get('stripeToken')
      ]);

      return response()->json([
        'success' => 'Your payment has been successfully processed',
        'payload' => $charge
      ]);

    } catch (\Exception $exception) {
      return response()->json([
        'error' => $exception->getMessage(),
        'status' => $exception->getCode(),
        'result' => $request->get('stripeToken')
      ]);
    }
  }
}
