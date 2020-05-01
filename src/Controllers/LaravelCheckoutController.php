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
use Cartalyst\Stripe\Laravel\Facades\Stripe;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = auth()->user()->buy;
        return view("LaravelDashboard::checkout", compact('products'));
    }

    /**
     * Create stripe charges.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function charges(Request $request)
    {
        try {
            $charge = Stripe::charges()->create([
                'currency' => 'USD',
                'amount'   => $request->get('amount'),
                'source'   => $request->get('stripeToken')
            ]);
            return response()->json([
                'success' => 'Your payment has been successfully processed',
                'payload' => $charge
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'error'  => $exception->getMessage(),
                'status' => $exception->getCode(),
                'result' => $request->get('stripeToken')
            ]);
        }
    }
}
