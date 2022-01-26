<?php
/*
 * This file is part of the yaldash  package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


$namespacePrefix = 'yal\laraveldash\Controllers';

Route::prefix(config('laravelDash.prefix'))->group(function () use ($namespacePrefix) {

  Route::get('/', function () {
    return view('laravelDash::welcome');
  });

  Route::get(config('laraveldash.routes.Dashboard'), $namespacePrefix. '\DashboardController@index')
    ->name('dashboard.home');

  Route::resource('post', $namespacePrefix. '\PostController');

  Route::get(config('laraveldash.routes.Settings'),  $namespacePrefix. '\SettingsController@index')
            ->name('dashboard.settings.index');

  Route::put(config('laraveldash.routes.Settings'),  $namespacePrefix .'\SettingsController@update')
            ->name('dashboard.settings.update');

  Route::post(config('laraveldash.routes.Settings').'/upload/avatar', $namespacePrefix. '\SettingsController@Upload')
            ->name('dashboard.settings.upload_avatar');

  Route::post(config('laraveldash.routes.Settings').'/delete', $namespacePrefix. '\SettingsController@Delete')
            ->name('dashboard.settings.delete_account.destroy');

  Route::get(config('laraveldash.routes.Manage'), $namespacePrefix. '\ManageController@index')
            ->name('dashboard.manage.index');

  Route::get(config('laraveldash.routes.JsonManage'), $namespacePrefix. '\ManageController@Response')
            ->name('dashboard.manage.jsonData');

  Route::get(config('laraveldash.routes.Users'), $namespacePrefix. '\SubscribeController@index')
            ->name('dashboard.users');

  Route::post(config('laraveldash.routes.Users'), $namespacePrefix. '\SubscribeController@store')
            ->name('dashboard.users.store');

  Route::put(config('laraveldash.routes.Manage').'/{id}/{type}', $namespacePrefix. '\ManageController@Delete')
            ->name('dashboard.manage.delete');

  Route::get(config('laraveldash.routes.Checkout'), $namespacePrefix. '\CheckoutController@index')
            ->name('dashboard.checkout.index');

  Route::post(config('laraveldash.routes.Checkout'), $namespacePrefix. '\CheckoutController@charges')
            ->name('dashboard.checkout.charges');

  Route::get(config('laraveldash.routes.Store'), $namespacePrefix. '\StoreController@index')
            ->name('dashboard.store.index');

  Route::post(config('laraveldash.routes.Store'), $namespacePrefix. '\StoreController@store')
            ->name('dashboard.store.store');

  Route::get(config('laraveldash.routes.Sell'), $namespacePrefix. '\SellController@index')
            ->name('dashboard.sell.index');

  Route::post(config('laraveldash.routes.Buy').'/{id}', $namespacePrefix. '\StoreController@buy')
            ->name('dashboard.store.buy');

  Route::post(config('laraveldash.routes.View').'/device/{id}', $namespacePrefix. '\PostController@DevicesStore')
            ->name('dashboard.post.DevicesStore');

  Route::get('published/{folder}/{file}', $namespacePrefix. '\DashboardController@Dashboard_assets')
            ->name('dashboard.assets');

  Route::get('ViewsState', $namespacePrefix. '\DashboardController@ViewsState')
            ->name('dashboard.views.state');

});
