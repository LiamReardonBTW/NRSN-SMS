<?php

namespace App\Http\Controllers\Admin\clientcontracts;

use App\Http\Requests\StoreClientContractRequest;
use App\Http\Requests\UpdateClientContractRequest;
use App\Models\Client;
use App\Models\ClientContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientcontracts = ClientContract::all();

        return view('admin/clientcontracts.index', compact('clientcontracts'));
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
