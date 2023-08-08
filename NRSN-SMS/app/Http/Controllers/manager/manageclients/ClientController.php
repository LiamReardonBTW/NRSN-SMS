<?php

namespace App\Http\Controllers\manager\manageclients;

use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        $clients = Client::all();

        return view('manager/manageclients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('manager/manageclients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        Client::create($request->validated());

        return redirect()->route('manageclients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $manageclient)
    {
        return view('manager/manageclients.show', compact('manageclient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $manageclient)
    {
        return view('manager/manageclients.edit', compact('manageclient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $manageclient)
    {
        $manageclient->update($request->validated());

        return redirect()->route('manageclients.show', $manageclient);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $manageclient)
    {
        $manageclient->delete();
        return redirect()->route('manageclients.index');
    }
}
