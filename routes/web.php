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
Route::get('/books', 'BookController@index')->name('books');
Route::get('/book/{slug}', 'BookController@book')->name('book');
Route::post('/account-add-to-favorite', 'BookController@addToFavorite')->name('addToFavorite');
Route::post('/account-add-to-watch-later', 'BookController@addToWatchLater')->name('addToWatchLater');
Route::post('/subscribe', 'HomeController@subscribe')->name('subscribe');
Route::post('/post-comment', 'BookController@review')->name('review');


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

    // Categories
    Route::get('/categories', "AdminCategoryController@index");
    Route::get('/categories/create', "AdminCategoryController@create");
    Route::post('/categories/store', "AdminCategoryController@store");
    Route::get('/categories/edit/{id}', "AdminCategoryController@edit");
    Route::post('/categories/update', "AdminCategoryController@update");
    Route::get('/categories/delete/{id}', "AdminCategoryController@delete");

    // Categories
    Route::get('/books', "AdminBookController@index");
    Route::get('/books/create', "AdminBookController@create");
    Route::post('/books/store', "AdminBookController@store");
    Route::get('/books/edit/{id}', "AdminBookController@edit");
    Route::post('/books/update', "AdminBookController@update");
    Route::get('/books/delete/{id}', "AdminBookController@delete");

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

