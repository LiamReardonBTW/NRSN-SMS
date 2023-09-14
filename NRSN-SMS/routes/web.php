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

Route::fallback(function () {
    return redirect()->route('dashboard')->with('alert-fail', 'Error: The requested page does not exist.');
});

Route::group(['middleware' => 'isWorker'], function(){
    Route::resource('worker/myclients', App\Http\Controllers\worker\myclients\ClientController::class);
    Route::resource('worker/myshifts', App\Http\Controllers\worker\myshifts\ShiftController::class);
});

Route::group(['middleware' => 'isManager'], function(){
    Route::resource('manager/manageclients', App\Http\Controllers\manager\manageclients\ClientController::class);
    Route::resource('manager/manageshifts', App\Http\Controllers\manager\manageshifts\ShiftController::class);
    Route::resource('manager/manageworkers', App\Http\Controllers\manager\manageworkers\WorkerController::class);

    Route::get('manager/manageclients/{clientId}/contract', 'App\Http\Controllers\manager\manageclients\ClientController@showContracts')->name('client.contracts');
    Route::get('manager/manageworkers/{workerId}/contract', 'App\Http\Controllers\manager\manageworkers\WorkerController@showContracts')->name('client.contracts');
});

Route::group(['middleware' => 'isAdmin'], function(){
    Route::resource('admin/allclients', App\Http\Controllers\admin\allclients\ClientController::class);
    Route::resource('admin/allusers', App\Http\Controllers\admin\allusers\UserController::class);
    Route::resource('admin/allshifts', App\Http\Controllers\admin\allshifts\ShiftController::class);
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
