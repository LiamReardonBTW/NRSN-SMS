<?php

namespace App\Http\Controllers\worker\myclients;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        // Get the currently logged-in user
        $user = Auth::user();

        // Retrieve clients where the current user is in the 'supported_by' relationship
        $clients = Client::where('active', '1')
            ->whereHas('supportedByUser', function ($query) use ($user) {
                $query->where('id', $user->id);
            })
            ->get();

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
    public function store()
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Client $myclient)
    {
        // Check if the user supports the client
        $user = Auth::user();
        if (!$user->supportedClients->contains($myclient)) {
            // Redirect to a different page or show an error message
            return redirect()->route('myclients.index'); // Replace with your desired route or action
        }

        return view('worker/myclients.show', compact('myclient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {

    }
}
