<?php

namespace App\Http\Controllers\Admin\allinvoices;

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
        // Fetch paid or pending client invoices and order them as desired
        $allInvoices = Invoice::orderByRaw("CASE WHEN status = 'pending' THEN 1 ELSE 2 END")
            ->orderBy('updated_at', 'desc')
            ->where(function ($query) {
                $query->where('status', 'paid')
                    ->orWhere('status', 'pending');
            })
            ->get();

        // Fetch archived client invoices
        $archivedInvoices = Invoice::orderBy('updated_at', 'desc')
            ->where('status', 'archived')
            ->get();

        return view('admin/allinvoices.index', compact('allInvoices', 'archivedInvoices'));
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
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->back();
    }
}
