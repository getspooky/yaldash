<?php
/*
 * This file is part of the laravelDash package.
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

  Route::get('Dashboard', $namespacePrefix. '\DashboardController@index')
    ->name('dashboard.home');
  Route::resource('post', $namespacePrefix. '\PostController');
  Route::get('Settings',  $namespacePrefix. '\SettingsController@index')
            ->name('dashboard.settings.index');
  Route::put('Settings',  $namespacePrefix .'\SettingsController@update')
            ->name('dashboard.settings.update');
  Route::post('Settings/upload/avatar', $namespacePrefix. '\SettingsController@Upload')
            ->name('dashboard.settings.upload_avatar');
  Route::post('Settings/delete', $namespacePrefix. '\SettingsController@Delete')
            ->name('dashboard.settings.delete_account.destroy');
  Route::get('Manage', $namespacePrefix. '\ManageController@index')
            ->name('dashboard.manage.index');
  Route::get('JsonManage', $namespacePrefix. '\ManageController@Response')
            ->name('dashboard.manage.jsonData');
  Route::get('Users', $namespacePrefix. '\SubscribeController@index')
            ->name('dashboard.users');
  Route::post('Users', $namespacePrefix. '\SubscribeController@store')
            ->name('dashboard.users.store');
  Route::put('Manage/{id}/{type}', $namespacePrefix. '\ManageController@Delete')
            ->name('dashboard.manage.delete');
  Route::get('Checkout', $namespacePrefix. '\CheckoutController@index')
            ->name('dashboard.checkout.index');
  Route::post('Checkout', $namespacePrefix. '\CheckoutController@charges')
            ->name('dashboard.checkout.charges');
  Route::get('Store', $namespacePrefix. '\StoreController@index')
            ->name('dashboard.store.index');
  Route::post('Store', $namespacePrefix. '\StoreController@store')
            ->name('dashboard.store.store');
  Route::get('Sell', $namespacePrefix. '\SellController@index')
            ->name('dashboard.sell.index');
  Route::post('Buy/{id}', $namespacePrefix. '\StoreController@buy')
            ->name('dashboard.store.buy');
  Route::post('View/device/{id}', $namespacePrefix. '\PostController@DevicesStore')
            ->name('dashboard.post.DevicesStore');
  Route::get('published/{folder}/{file}', $namespacePrefix. '\DashboardController@Dashboard_assets')
            ->name('dashboard.assets');
  Route::get('ViewsState', $namespacePrefix. '\DashboardController@ViewsState')
            ->name('dashboard.views.state');

});
