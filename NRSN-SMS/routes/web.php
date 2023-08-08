<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'auth'], function(){
    Route::resource('admin/allclients', App\Http\Controllers\admin\allclients\ClientController::class);
    Route::resource('admin/allusers', App\Http\Controllers\admin\allusers\UserController::class);
    Route::resource('admin/allshifts', App\Http\Controllers\admin\allshifts\ShiftController::class);
    Route::resource('worker/myclients', App\Http\Controllers\worker\myclients\ClientController::class);
    Route::resource('manager/manageclients', App\Http\Controllers\manager\manageclients\ClientController::class);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
