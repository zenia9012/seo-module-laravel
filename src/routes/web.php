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


use Yevhenii\Seo\Http\Controllers\AuthController;

Route::middleware(['web', 'seo-auth'])->group(function () {
    Route::get('/seo/admin', \Yevhenii\Seo\Http\Controllers\AdminController::class . '@index')->name('seo.admin.index');
});

Route::middleware(['web'])->group(function () {
    Route::get('/seo/login', AuthController::class . '@showLogin')->name('seo-login');
    Route::post('/seo/login', AuthController::class . '@login')->name('seo-login.login');
    Route::get('/seo/logout', AuthController::class . '@logout')->name('seo-login.logout');
});;

