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


Route::middleware(['seo-auth'])->group(function () {
    Route::get('/seo/admin', \Yevhenii\Seo\Http\Controllers\AdminController::class . '@index')->name('seo.admin.index');
});

Route::get('/seo/login', \Yevhenii\Seo\Http\Controllers\AuthController::class . '@login')->name('seo-login');

