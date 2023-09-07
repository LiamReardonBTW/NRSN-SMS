<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\worker\myclients\ClientController as WorkerClientController;
use App\Http\Controllers\worker\myshifts\ShiftController as WorkerShiftController;
use App\Http\Controllers\manager\manageclients\ClientController as ManagerClientController;
use App\Http\Controllers\manager\manageshifts\ShiftController as ManagerShiftController;
use App\Http\Controllers\manager\manageworkers\WorkerController as ManagerWorkerController;
use App\Http\Controllers\admin\allclients\ClientController as AdminClientController;
use App\Http\Controllers\admin\allusers\UserController as AdminUserController;
use App\Http\Controllers\admin\allshifts\ShiftController as AdminShiftController;
use App\Http\Controllers\admin\allusers\UserClientController;

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



// Home page route
Route::get('/', function () {
    return view('welcome');
});

// Fallback route for non-existing pages
Route::fallback(function () {
    return redirect()->route('dashboard')->with('alert-fail', 'Error: The requested page does not exist.');
});

// Routes for workers
Route::middleware(['middleware' => 'isWorker'])->group(function () {
    Route::resource('worker/myclients', WorkerClientController::class);
    Route::resource('worker/myshifts', WorkerShiftController::class);
});

// Admin Route group
Route::middleware(['middleware' => 'isManager'])->group(function () {
    Route::resource('manager/manageclients', ManagerClientController::class);
    Route::resource('manager/manageshifts', ManagerShiftController::class);
    Route::resource('manager/manageworkers', ManagerWorkerController::class);
});

// Admin Route group with nested routes for User management and User-Client relationship management
Route::middleware(['middleware' => 'isAdmin'])->group(function () {
    // Resourceful routes for User management
    Route::resource('admin/allusers', AdminUserController::class);

    // Nested resourceful routes for User-Client relationship management
    Route::resource('admin/allusers.clients', UserClientController::class)->only(['create', 'store', 'destroy']);

    // Custom routes for user-client relationship management
    Route::post('admin/allusers/{alluser}/attach-client/{client}', [UserClientController::class, 'attachClient'])->name('allusers.clients.attachClient');
    Route::post('admin/allusers/{alluser}/detach-client/{client}', [UserClientController::class, 'detachClient'])->name('allusers.clients.detachClient');
    Route::post('admin/allusers/{alluser}/sync-clients', [UserClientController::class, 'syncClients'])->name('allusers.clients.syncClients');

    // Resourceful routes for Client management
    Route::resource('admin/allclients', AdminClientController::class);

    // Resourceful routes for Shift management
    Route::resource('admin/allshifts', AdminShiftController::class);
});

// Dashboard route for authenticated users
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
