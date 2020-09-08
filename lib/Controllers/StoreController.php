<?php
/*
 * This file is part of the laravelDash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace yal\laraveldash\Controllers;

use Exception;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use yal\laraveldash\Models\Buy;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use yal\laraveldash\Events\NotificationEvent;

class StoreController extends Controller
{

    public function __construct()
    {
        $this->middleware(['web', 'auth']);
    }

    public function index()
    {
        $store = auth()->user()->store()->orderByDesc('id')->get();
        return view('laravelDash::store', compact('store'));
    }

    public function buy($id)
    {
        Buy::create([
            "user_id"  => auth()->id(),
            "store_id" => $id
         ]);
        return redirect()->route('dashboard.checkout.index');
    }

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
                $generate_name = Str::random(16) . '.' . $request->file('file_name')->getClientOriginalExtension();
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
