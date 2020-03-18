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
use Yevhenii\Seo\Http\Controllers\SeoAdminController;

Route::middleware(['web', 'seo-auth'])->group(function () {
    Route::delete('/seo/admin/seo/{seo}', SeoAdminController::class . '@delete')->name('seo.admin.seo.destroy');
    Route::get('/seo/admin/seo', SeoAdminController::class . '@index')->name('seo.admin.seo');
});

Route::middleware(['web'])->group(function () {
    Route::get('/seo/login', AuthController::class . '@showLogin')->name('seo-login');
    Route::post('/seo/login', AuthController::class . '@login')->name('seo-login.login');
    Route::get('/seo/logout', AuthController::class . '@logout')->name('seo-login.logout');
});;

Route::resource('photo', AuthController::class);

