<?php
/*
 * This file is part of the laravelDash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

Route::prefix(config('laravelDash.prefix'))->group(function () {

  Route::get('/', function () {
    return view('LaravelDashboard::welcome');
  });

  Route::get('Dashboard', 'LaravelDash\Controllers\LaravelDashboardController@index')
            ->name('dashboard.home');
  Route::resource('post', 'LaravelDash\Controllers\LaravelPostController');
  Route::get('Settings',  'LaravelDash\Controllers\LaravelSettingsController@index')
            ->name('dashboard.settings.index');
  Route::put('Settings',  'LaravelDash\Controllers\LaravelSettingsController@Update')
            ->name('dashboard.settings.update');
  Route::post('Settings/upload/avatar', 'LaravelDash\Controllers\LaravelSettingsController@Upload')
            ->name('dashboard.settings.upload_avatar');
  Route::post('Settings/delete', 'LaravelDash\Controllers\LaravelSettingsController@Delete')
            ->name('dashboard.settings.delete_account.destroy');
  Route::get('Manage', 'LaravelDash\Controllers\LaravelManageController@index')
            ->name('dashboard.manage.index');
  Route::get('JsonManage', 'LaravelDash\Controllers\LaravelManageController@Response')
            ->name('dashboard.manage.jsonData');
  Route::get('Users', 'LaravelDash\Controllers\LaravelSubscribeController@index')
            ->name('dashboard.users');
  Route::post('Users', 'LaravelDash\Controllers\LaravelSubscribeController@store')
            ->name('dashboard.users.store');
  Route::put('Manage/{id}/{type}', 'LaravelDash\Controllers\LaravelManageController@Delete')
            ->name('dashboard.manage.delete');
  Route::get('Checkout', 'LaravelDash\Controllers\LaravelCheckoutController@index')
            ->name('dashboard.checkout.index');
  Route::post('Checkout', 'LaravelDash\Controllers\LaravelCheckoutController@charges')
            ->name('dashboard.checkout.charges');
  Route::get('Store', 'LaravelDash\Controllers\LaravelStoreController@index')
            ->name('dashboard.store.index');
  Route::post('Store', 'LaravelDash\Controllers\LaravelStoreController@store')
            ->name('dashboard.store.store');
  Route::get('Sell', 'LaravelDash\Controllers\LaravelSellController@index')
            ->name('dashboard.sell.index');
  Route::post('Buy/{id}', 'LaravelDash\Controllers\LaravelStoreController@buy')
            ->name('dashboard.store.buy');
  Route::post('View/device/{id}', 'LaravelDash\Controllers\LaravelPostController@DevicesStore')
            ->name('dashboard.post.DevicesStore');
  Route::get('published/{folder}/{file}', 'LaravelDash\Controllers\LaravelDashboardController@Dashboard_assets')
            ->name('dashboard.assets');
  Route::get('ViewsState', 'LaravelDash\Controllers\LaravelDashboardController@ViewsState')
            ->name('dashboard.views.state');

});
