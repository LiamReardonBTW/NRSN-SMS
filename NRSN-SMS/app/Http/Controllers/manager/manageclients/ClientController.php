<?php

namespace App\Http\Controllers\manager\manageclients;

use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        $user = auth()->user();
        $clients = Client::whereHas('managedByUser', function ($query) use ($user) {
        $query->where('user_id', $user->id);
        })->get();

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
        // Get the authenticated user's ID
        $userId = auth()->user();

        // Create the client
        $clientData = $request->validated();
        $client = Client::create($clientData);

        // Create the relationship with the 'managed_by' relation
        $client->managedByUser()->attach($userId, ['relation' => 'managed_by']);

        return redirect()->route('manageclients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $manageclient)
    {
        // Get the authenticated user
        $currentUser = auth()->user();

        // Check if the authenticated user has a relationship with the client
        if ($currentUser->managedClients->contains($manageclient)) {
            return view('manager/manageclients.show', compact('manageclient'));
        } else {
            return redirect()->route('manageclients.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $manageclient)
    {
        // Get the authenticated user
        $currentUser = auth()->user();
        $allUsers = User::all();
        // Check if the authenticated user has a relationship with the client
        if ($currentUser->managedClients->contains($manageclient)) {

            return view('manager/manageclients.edit', compact('manageclient', 'allUsers'));
        } else {
            return redirect()->route('manageclients.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $manageclient)
    {
        $validatedData = $request->validated();

        // Handle supported clients
        if (isset($validatedData['supported_by'])) {
            foreach ($validatedData['supported_by'] as $userId) {
                // Check if the client is not already supported, then create the relationship
                if (!$manageclient->supportedByUser->contains($userId)) {
                    $manageclient->supportedByUser()->attach($userId, ['relation' => 'supported_by']);
                }
            }

            // Remove unsupported clients (clients that were supported but now unchecked)
            $unsupportedByUsers = $manageclient->supportedByUser->pluck('id')->diff($validatedData['supported_by']);
            $manageclient->supportedByUser()->detach($unsupportedByUsers);
        } else {
            // If no clients are selected, detach all supported clients
            $manageclient->supportedByUser()->detach();
        }

       // Handle other user data updates
       $manageclient->update($validatedData);

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
