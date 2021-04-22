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

use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use yal\laraveldash\Models\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use yal\laraveldash\Events\NotificationEvent;
use yal\laraveldash\Notifications\DashboardNotification;

class SettingsController extends Controller
{

  private $user_information = [
    'country_id',
    'zip',
    'address',
    'description',
    'city',
    'last_name'
  ];

  private $user_register_default_information = ['email', 'name'];

  public function __construct()
  {
    $this->middleware(['web', 'auth']);
  }

  public function index()
  {
    $countries = Country::all('name', 'id');
    return view('laravelDash::users.settings', compact('countries'));
  }

  public function update(Request $request)
  {
    $this->Validator($request->all())->validate();
    $attach = auth()->user()->information();

    is_null($attach->first()) ?
      $attach->create($this->Filter($this->user_information, $request->all())) :
      $attach->Update($this->Filter($this->user_information, $request->all()));

    config('auth.providers.users.model', App\Models\User::class)::find(auth()->id())->update(
      $this->Filter($this->user_register_default_information, $request->all()
      ));

    config('auth.providers.users.model', App\Models\User::class)::find(auth()->id())->notify(
      (new DashboardNotification('your account has been updated successfully',
        'settings', \auth()->user()->name))->delay(now()->addSeconds(40)
      ));

    event(new NotificationEvent([
      'message' => 'your information has benn updated successfully',
      'type' => 'settings',
      'name' => auth()->user()->name,
      'to' => 'auth'
    ]));

    return redirect()->route('dashboard.settings.update')
      ->with('status', 'Information has been update successfully!');

  }

  public function Validator(array $data)
  {
    return Validator::make($data, [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255'],
      'last_name' => ['required', 'string', 'max:20'],
      'address' => ['required', 'string', 'min:3'],
      'city' => ['required', 'string'],
      'zip' => ['required', 'numeric'],
      'country_id' => ['required', 'integer'],
      'description' => ['required', 'string', 'min:80', 'max:200']
    ]);
  }

  public function Filter(array $filter, array $request)
  {
    return array_filter($request, function ($element) use ($filter) {
      return in_array($element, $filter);
    }, ARRAY_FILTER_USE_KEY);
  }

  public function RenderDelete()
  {
    return view("laravelDash::dashboard.delete");
  }

  public function Upload(Request $request)
  {
    $user = auth()->user()->attachementUser();
    $generate_name = Str::random(16) . '.' . $request->file('file')->getClientOriginalExtension();
    $upload_avatar = $user->create(['file_name' => $generate_name]);
    if ($upload_avatar) {
      $user->getRelated()->newInstance()
        ->UploadFile(new File($request->file('file')), $generate_name);
    }
    return redirect()->route('dashboard.settings.index');
  }
}
