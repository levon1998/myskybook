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

Route::get('/', 'HomeController@index');


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
Route::prefix('v1-admin')->group(function () {
    Route::get('/', "AdminDashboardController@index");
    Route::get('/users', "AdminUserController@index");
    Route::get('/donates', "AdminDonateController@index");
    Route::get('/plans', "AdminPlanController@index");
    Route::get('/reports', "AdminReportController@index");
});


