<?php

namespace App\Http\Controllers\admin\allclients;

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

        return view('admin/allclients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/allclients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        Client::create($request->validated());

        return redirect()->route('allclients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $allclient)
    {
        return view('admin/allclients.show', compact('allclient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $allclient)
    {
        return view('admin/allclients.edit', compact('allclient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $allclient)
    {
        $allclient->update($request->validated());

        return redirect()->route('allclients.show', $allclient);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $allclient)
    {
        $allclient->delete();
        return redirect()->route('allclients.index');
    }
}
