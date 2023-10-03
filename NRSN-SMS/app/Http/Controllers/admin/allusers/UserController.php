<?php

namespace App\Http\Controllers\admin\allusers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('admin/allusers.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/allusers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        User::create($request->validated());

        return redirect()->route('allusers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $alluser)
    {

        return view('admin/allusers.show', compact('alluser'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $alluser)
    {
        $allClients = Client::where('active', true);
        return view('admin/allusers.edit', compact('alluser', 'allClients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $alluser)
    {

        $validatedData = $request->validated();

        // Handle supported clients
        if (isset($validatedData['supported_clients'])) {
            foreach ($validatedData['supported_clients'] as $clientId) {
                // Check if the client is not already supported, then create the relationship
                if (!$alluser->supportedClients->contains($clientId)) {
                    $alluser->supportedClients()->attach($clientId, ['relation' => 'supported_by']);
                }
            }

            // Remove unsupported clients (clients that were supported but now unchecked)
            $unsupportedClients = $alluser->supportedClients->pluck('id')->diff($validatedData['supported_clients']);
            $alluser->supportedClients()->detach($unsupportedClients);
        } else {
            // If no clients are selected, detach all supported clients
            $alluser->supportedClients()->detach();
        }

        // Handle managed clients
        if (isset($validatedData['managed_clients'])) {
            foreach ($validatedData['managed_clients'] as $clientId) {
                // Check if the client is not already managed, then create the relationship
                if (!$alluser->managedClients->contains($clientId)) {
                    $alluser->managedClients()->attach($clientId, ['relation' => 'managed_by']);
                }
            }

            // Remove unmanaged clients (clients that were managed but now unchecked)
            $unmanagedClients = $alluser->managedClients->pluck('id')->diff($validatedData['managed_clients']);
            $alluser->managedClients()->detach($unmanagedClients);
        } else {
            // If no clients are selected, detach all managed clients
            $alluser->managedClients()->detach();
        }

        // Handle other user data updates
        $alluser->update($validatedData);

        return redirect()->route('allusers.show', $alluser);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $alluser)
    {
        $alluser->delete();
        return redirect()->route('allusers.index');
    }
}
