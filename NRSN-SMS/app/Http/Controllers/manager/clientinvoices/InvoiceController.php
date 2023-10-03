<?php

namespace App\Http\Controllers\manager\clientinvoices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Client;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch pending and paid client invoices where the managed_by relation exists with the authenticated user
        $managedClientInvoices = Invoice::where('type', 'client')
            ->whereIn('status', ['pending', 'paid'])
            ->whereHasMorph('recipient', [Client::class], function ($query, $type) {
                $query->whereHas('managedbyuser', function ($subquery) {
                    $subquery->where('user_id', auth()->id());
                });
            })
            ->orderBy('updated_at', 'desc')
            ->get();

        // Fetch archived client invoices where the managed_by relation exists with the authenticated user
        $managedClientArchivedInvoices = Invoice::where('type', 'client')
            ->where('status', 'archived')
            ->whereHasMorph('recipient', [Client::class], function ($query, $type) {
                $query->whereHas('managedbyuser', function ($subquery) {
                    $subquery->where('user_id', auth()->id());
                });
            })
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('manager/clientinvoices.index', compact('managedClientInvoices', 'managedClientArchivedInvoices'));
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
