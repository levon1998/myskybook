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
Route::post('/subscribe', 'HomeController@subscribe')->name('subscribe');


Auth::routes(['verify' => true]);

/**
 * Admin Url For not authenticated users
 */
Route::prefix('v1-admin')->group(function () {
    Route::get('login', "AdminAuthController@login");
    Route::post('login', "AdminAuthController@authUser");

    // Tags
    Route::get('/tags', "AdminTagController@index");
    Route::get('/tags/create', "AdminTagController@create");
    Route::post('/tags/store', "AdminTagController@store");
    Route::get('/tags/edit/{id}', "AdminTagController@edit");
    Route::post('/tags/update', "AdminTagController@update");
    Route::get('/tags/delete/{id}', "AdminTagController@delete");

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
    Route::get('/favorites', 'UserAccountController@favorites')->name('favorites');

    // Account Settings
    Route::post('/account-save-changes', 'UserAccountController@accountSaveChanges')->name('account-save-changes');
    Route::post('/account-save-password', 'UserAccountController@accountSavePassword')->name('account-save-password');
});

