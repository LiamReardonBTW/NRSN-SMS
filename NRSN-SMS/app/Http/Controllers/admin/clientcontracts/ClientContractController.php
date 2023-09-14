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
        $clients = Client::all();
        return view('admin/clientcontracts.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientContractRequest $request)
    {
        ClientContract::create($request->validated());

        return redirect()->route('clientcontracts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClientContract $clientcontract)
    {
        return view('admin.clientcontracts.show', compact('clientcontract'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientContract $clientcontract)
    {
        $allClients = Client::all();
        return view('admin/clientcontracts.edit', compact('clientcontract', 'allClients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientContractRequest $request, ClientContract $clientcontract)
    {
        $validatedData = $request->validated();
        $clientcontract->update($validatedData);

        return redirect()->route('clientcontracts.show', $clientcontract);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientContract $clientcontract)
    {
        $clientcontract->delete();
        return redirect()->route('clientcontracts.index');
    }
}
