<?php

namespace App\Http\Controllers\Worker;

use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;


class MyClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myclients = Client::all();

        return view('worker/myclients.index', compact('myclients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('worker/myclients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        Client::create($request->validated());

        return redirect()->route('worker/myclients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('worker/myclients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('worker/myclients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->validated());

        return redirect()->route('worker/myclients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('worker/myclients.index');
    }
}
