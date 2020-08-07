<?php
/*
 * This file is part of the laravelDash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$namespacePrefix = 'LaravelDashboard\Controllers';

Route::prefix('demo')->group(function () use ($namespacePrefix) {

  Route::get('/', function () {
    return view('LaravelDashboard::welcome');
  });

  Route::get('Dashboard', $namespacePrefix. '\LaravelDashboardController@index')
    ->name('dashboard.home');
  Route::resource('post', $namespacePrefix. '\LaravelPostController');
  Route::get('Settings',  $namespacePrefix. '\LaravelSettingsController@index')
            ->name('dashboard.settings.index');
  Route::put('Settings',  $namespacePrefix .'\LaravelSettingsController@Update')
            ->name('dashboard.settings.update');
  Route::post('Settings/upload/avatar', $namespacePrefix. '\LaravelSettingsController@Upload')
            ->name('dashboard.settings.upload_avatar');
  Route::post('Settings/delete', $namespacePrefix. '\LaravelSettingsController@Delete')
            ->name('dashboard.settings.delete_account.destroy');
  Route::get('Manage', $namespacePrefix. '\LaravelManageController@index')
            ->name('dashboard.manage.index');
  Route::get('JsonManage', $namespacePrefix. '\LaravelManageController@Response')
            ->name('dashboard.manage.jsonData');
  Route::get('Users', $namespacePrefix. '\LaravelSubscribeController@index')
            ->name('dashboard.users');
  Route::post('Users', $namespacePrefix. '\LaravelSubscribeController@store')
            ->name('dashboard.users.store');
  Route::put('Manage/{id}/{type}', $namespacePrefix. '\LaravelManageController@Delete')
            ->name('dashboard.manage.delete');
  Route::get('Checkout', $namespacePrefix. '\LaravelCheckoutController@index')
            ->name('dashboard.checkout.index');
  Route::post('Checkout', $namespacePrefix. '\LaravelCheckoutController@charges')
            ->name('dashboard.checkout.charges');
  Route::get('Store', $namespacePrefix. '\LaravelStoreController@index')
            ->name('dashboard.store.index');
  Route::post('Store', $namespacePrefix. '\LaravelStoreController@store')
            ->name('dashboard.store.store');
  Route::get('Sell', $namespacePrefix. '\LaravelSellController@index')
            ->name('dashboard.sell.index');
  Route::post('Buy/{id}', $namespacePrefix. '\LaravelStoreController@buy')
            ->name('dashboard.store.buy');
  Route::post('View/device/{id}', $namespacePrefix. '\LaravelPostController@DevicesStore')
            ->name('dashboard.post.DevicesStore');
  Route::get('published/{folder}/{file}', $namespacePrefix. '\LaravelDashboardController@Dashboard_assets')
            ->name('dashboard.assets');
  Route::get('ViewsState', $namespacePrefix. '\LaravelDashboardController@ViewsState')
            ->name('dashboard.views.state');

});
