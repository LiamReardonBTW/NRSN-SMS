<?php

namespace App\Http\Controllers\manager\manageworkers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        $users = User::where('role', '2')->get();

        return view('manager/manageworkers.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('manager/manageworkers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        User::create($request->validated());

        return redirect()->route('manageworkers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $manageworker)
    {

        return view('manager/manageworkers.show', compact('manageworker'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $manageworker)
    {
        $loggedInUserId = Auth::id();

        $allClients = Client::whereHas('managedByUser', function ($query) use ($loggedInUserId) {
            $query->where('user_id', $loggedInUserId);
        })->get();
        return view('manager/manageworkers.edit', compact('manageworker', 'allClients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $manageworker)
    {
        $manageworker->update($request->validated());
        // dd($manageworker);
        return redirect()->route('manageworkers.show', $manageworker);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $manageworker)
    {
        $manageworker->delete();
        return redirect()->route('manageworkers.index');
    }

    public function showContracts($userId)
    {
        // Find the client by ID and check if it's associated with the current user
        $user = User::find($userId);

        // Load the client's contracts
        $contracts = $user->userContracts; // Assuming you have a relationship defined

        // Pass the client and contracts data to the view
        return view('manager.manageworkers.contract', compact('user', 'contracts'));
    }

}
