<?php

namespace App\Http\Controllers\admin\allclients;

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
        $allUsers = User::all();
        return view('admin/allclients.edit', compact('allclient', 'allUsers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $allclient)
    {
        $validatedData = $request->validated();

        // Handle supported clients
        if (isset($validatedData['supported_by'])) {
            foreach ($validatedData['supported_by'] as $userId) {
                // Check if the client is not already supported, then create the relationship
                if (!$allclient->supportedByUser->contains($userId)) {
                    $allclient->supportedByUser()->attach($userId, ['relation' => 'supported_by']);
                }
            }

            // Remove unsupported clients (clients that were supported but now unchecked)
            $unsupportedByUsers = $allclient->supportedByUser->pluck('id')->diff($validatedData['supported_by']);
            $allclient->supportedByUser()->detach($unsupportedByUsers);
        } else {
            // If no clients are selected, detach all supported clients
            $allclient->supportedByUser()->detach();
        }

        // Handle Managed clients
        if (isset($validatedData['managed_by'])) {
            foreach ($validatedData['managed_by'] as $userId) {
                // Check if the user is not already managing this client, then create the relationship
                if (!$allclient->managedByUser->contains($userId)) {
                    $allclient->managedByUser()->attach($userId, ['relation' => 'managed_by']);
                }
            }

            // Remove users who are no longer managing this client (users that were managing but now unchecked)
            $unmanagedByUsers = $allclient->managedByUser->pluck('id')->diff($validatedData['managed_by']);
            $allclient->managedByUser()->detach($unmanagedByUsers);
        } else {
            // If no users are selected, detach all users who were managing this client
            $allclient->managedByUser()->detach();
        }

        // Handle other user data updates
        $allclient->update($validatedData);

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
