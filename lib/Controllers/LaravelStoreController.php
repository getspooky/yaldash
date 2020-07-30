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

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use LaravelDashboard\Events\NotificationEvent;
use LaravelDashboard\Models\Buy;

class LaravelStoreController extends Controller
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
     * Display a Manage index .
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $store = auth()->user()->store()->orderBy('id', 'desc')->get();
        return view('LaravelDashboard::store', compact('store'));
    }

    /**
     * Buy Product
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function buy($id)
    {
        Buy::create([
            "user_id"  => auth()->id(),
            "store_id" => $id
         ]);
        return redirect()->route('dashboard.checkout.index');
    }

    /**
     * Store products
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        try {
            Validator::make($request->all(), [
                "price" => "required|integer",
                "description" => "required|string",
                "file_name" => "required"
            ])->validate();

            $store = auth()->user()->store()->create([
                'price' => $request->get('price'),
                'description' => $request->get('description'),
            ]);

            if ($store) {
                event(new NotificationEvent([
                  'message' => 'your Product has been added successfully',
                  'type' => 'store',
                  'name' => auth()->user()->name,
                  'to' => 'auth'
                ]));
                $generate_name = str_random(16) . '.' . $request->file('file_name')->getClientOriginalExtension();
                $store->attachementStore()->create([
                    'file_name' => $generate_name,
                ]);
                $store->attachementStore()->getRelated()->newInstance()
                    ->UploadFile(new File($request->file('file_name')), $generate_name);
            }

            return redirect()->route('dashboard.store.index');

        } catch (Exception $e) {
            return response()->json(["error"=>$e->getMessage(), "code" => $e->getCode()]);
        }

    }
}
