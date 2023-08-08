<?php

namespace App\Http\Controllers\worker\myclients;

use Illuminate\Http\Request;
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
        $clients = Client::where('active',  '1')->get();

        return view('worker/myclients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Client $myclient)
    {
        return view('worker/myclients.show', compact('myclient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $myclient)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $myclient)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $myclient)
    {

    }
}
