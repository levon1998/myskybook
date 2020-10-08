<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);

/**
 * Admin Url For not authenticated users
 */
Route::prefix('v1-admin')->group(function () {
    Route::get('login', "AdminAuthController@login");
    Route::post('login', "AdminAuthController@authUser");
});

/**
 * Admin Url For authenticated users
 */
Route::prefix('v1-admin')->middleware('checkAdmin')->group(function () {
    Route::get('/', "AdminDashboardController@index");
    Route::get('/users', "AdminUserController@index");
    Route::get('/donates', "AdminDonateController@index");
    Route::get('/plans', "AdminPlanController@index");
    Route::get('/reports', "AdminReportController@index");
});

Route::middleware('auth')->group(function () {
   Route::get('/my-account', 'UserAccountController@index')->name('my-account');
   Route::get('/settings', 'UserAccountController@settings')->name('settings');
   Route::get('/watch-later', 'UserAccountController@watchLater')->name('watch-later');
   Route::get('/likes', 'UserAccountController@likes')->name('likes');
});

