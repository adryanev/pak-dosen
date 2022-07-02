<?php

use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/
Route::group(['prefix' => ADMIN, 'as' => ADMIN . '.', 'middleware' => ['auth', 'role:super-admin|admin']], function () {
    Route::get('/', 'DashboardController@index')->name('dash');
    Route::resource('users', 'UserController');
});

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth','role:super-admin|admin|dosen']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/', function () {
    return redirect('dashboard');
});
