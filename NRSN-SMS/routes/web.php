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

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    });
});

Route::fallback(function () {
    return redirect()->route('dashboard')->with('alert-fail', 'Error: The requested page does not exist.');
});

Route::group(['middleware' => 'isWorker'], function () {
    Route::resource('worker/myclients', App\Http\Controllers\worker\myclients\ClientController::class);
    Route::resource('worker/myshifts', App\Http\Controllers\worker\myshifts\ShiftController::class);
    Route::resource('worker/myinvoices', App\Http\Controllers\worker\myinvoices\InvoiceController::class);
});

Route::group(['middleware' => 'isManager'], function () {
    Route::resource('manager/manageclients', App\Http\Controllers\manager\manageclients\ClientController::class);
    Route::resource('manager/manageshifts', App\Http\Controllers\manager\manageshifts\ShiftController::class);
    Route::get('manager/manageshifts/{id}/approve', [App\Http\Controllers\manager\manageshifts\ShiftController::class, 'approve'])->name('manageshifts.approve');
    Route::get('manager/manageshifts/{id}/unapprove', [App\Http\Controllers\manager\manageshifts\ShiftController::class, 'unapprove'])->name('manageshifts.unapprove');
    Route::match(['post', 'patch'], '/manageshifts/update-invoiced/{id}', 'App\Http\Controllers\manager\manageshifts\ShiftController@updateInvoiced')->name('manageshifts.updateInvoiced');
    Route::resource('manager/manageworkers', App\Http\Controllers\manager\manageworkers\WorkerController::class);

    Route::get('manager/manageclients/{clientId}/contract', 'App\Http\Controllers\manager\manageclients\ClientController@showContracts')->name('client.contracts');
    Route::get('manager/manageworkers/{workerId}/contract', 'App\Http\Controllers\manager\manageworkers\WorkerController@showContracts')->name('user.contracts');

    Route::resource('manager/clientinvoices', App\Http\Controllers\manager\clientinvoices\InvoiceController::class);
});

Route::group(['middleware' => 'isAdmin'], function () {
    Route::resource('admin/allclients', App\Http\Controllers\admin\allclients\ClientController::class);
    Route::put('/admin/allclients/{client}/sync-activities', 'App\Http\Controllers\admin\allclients\ClientController@syncActivities')->name('admin.allclients.sync-activities');
    Route::resource('admin/allusers', App\Http\Controllers\admin\allusers\UserController::class);
    Route::resource('admin/allshifts', App\Http\Controllers\admin\allshifts\ShiftController::class);
    Route::get('admin/allshifts/{id}/approve', [App\Http\Controllers\admin\allshifts\ShiftController::class, 'approve'])->name('allshifts.approve');
    Route::get('admin/allshifts/{id}/unapprove', [App\Http\Controllers\admin\allshifts\ShiftController::class, 'unapprove'])->name('allshifts.unapprove');
    Route::get('admin/allshifts/{id}/markPaid', [App\Http\Controllers\admin\allshifts\ShiftController::class, 'markPaid'])->name('allshifts.markPaid');
    Route::get('admin/allshifts/{id}/unmarkPaid', [App\Http\Controllers\admin\allshifts\ShiftController::class, 'unmarkPaid'])->name('allshifts.unmarkPaid');
    Route::match(['post', 'patch'], '/allshifts/update-invoiced/{id}', 'App\Http\Controllers\admin\allshifts\ShiftController@updateInvoiced')->name('allshifts.updateInvoiced');
    Route::resource('admin/clientcontracts', App\Http\Controllers\admin\clientcontracts\ClientContractController::class);
    Route::resource('admin/usercontracts', App\Http\Controllers\admin\usercontracts\UserContractController::class);
    Route::resource('admin/activities', App\Http\Controllers\admin\activities\ActivityController::class);
    Route::resource('admin/business-details', App\Http\Controllers\admin\businessdetail\BusinessDetailController::class);

    Route::resource('admin/invoicing', App\Http\Controllers\admin\invoicing\InvoicingController::class);
    Route::post('/generate-client-invoice', 'App\Http\Controllers\admin\invoicing\InvoicingController@generateClientInvoice')->name('generate.client-invoice');
    Route::post('/generate-worker-invoice', 'App\Http\Controllers\admin\invoicing\InvoicingController@generateWorkerInvoice')->name('generate.worker-invoice');
    Route::post('/invoicing/mark-as-paid/{id}', [App\Http\Controllers\admin\invoicing\InvoicingController::class, 'markAsPaid'])
        ->name('markInvoiceAsPaid');
    Route::post('/invoicing/unmark-as-paid/{id}', [App\Http\Controllers\admin\invoicing\InvoicingController::class, 'unmarkAsPaid'])
        ->name('unmarkInvoiceAsPaid');
    Route::post('/invoicing/archive-invoice/{id}', [App\Http\Controllers\admin\invoicing\InvoicingController::class, 'archiveInvoice'])
        ->name('archiveInvoice');
    Route::post('/invoicing/unarchive-invoice/{id}', [App\Http\Controllers\admin\invoicing\InvoicingController::class, 'unarchiveInvoice'])
        ->name('unarchiveInvoice');

    Route::resource('admin/allinvoices', App\Http\Controllers\admin\allinvoices\InvoiceController::class)->except(['destroy']);
    Route::delete('allinvoices/{invoice}', 'App\Http\Controllers\admin\allinvoices\InvoiceController@destroy')->name('allinvoices.destroy');
});

// Create a route for serving client invoices
Route::get('storage/invoices/clientinvoices/{invoice_path}', 'App\Http\Controllers\admin\invoicing\InvoicingController@showClientInvoice')->middleware('clientinvoice.access')->name('client_invoice.show');

// Create a route for serving worker invoices
Route::get('storage/invoices/workerinvoices/{invoice_path}', 'App\Http\Controllers\admin\invoicing\InvoicingController@showWorkerInvoice')->middleware('workerinvoice.access')->name('worker_invoice.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
