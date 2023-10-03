<?php

namespace App\Http\Controllers\worker\myinvoices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch worker invoices where type is 'worker' and recipient is the authenticated user's ID
        $myInvoices = Invoice::where('type', 'worker')
            ->where('recipient_id', auth()->id())
            ->whereIn('status', ['pending', 'paid'])
            ->orderBy('updated_at', 'desc')
            ->get();

        $myArchivedInvoices = Invoice::where('type', 'worker')
            ->where('recipient_id', auth()->id())
            ->where('status', 'archived')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('worker/myinvoices.index', compact('myInvoices', 'myArchivedInvoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
