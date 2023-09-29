<?php

namespace App\Http\Controllers\manager\manageshifts;

use Illuminate\Http\Request;
use App\Http\Requests\StoreShiftRequest;
use App\Http\Requests\UpdateShiftRequest;
use App\Models\Shift;
use App\Models\Activity;
use App\Models\Client;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        $shifts = Shift::all();

        return view('manager/manageshifts.index', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get the authenticated user
        $user = Auth::user();
        $workers = User::where('role' , '2')->get();

        // Retrieve the clients supported by the user and their related activities
        $clients = optional($user->managedClients)->load('activityRates.activity');

        // Apply the 'active' filter after loading the related models
        $clients = $clients->where('active', true);

        // Prepare the $clientActivities variable in the desired format for JavaScript
        $clientActivities = [];
        foreach ($clients as $client) {
            $clientActivities[$client->id] = $client->activityRates->pluck('activity');
        }
        return view('manager/manageshifts.create', compact('workers', 'clients', 'clientActivities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShiftRequest $request)
    {
        Shift::create($request->validated());

        return redirect()->route('manageshifts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shift $manageshift)
    {
        $activities = Activity::All();
        return view('manager/manageshifts.show', compact('manageshift', 'activities'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shift $manageshift)
    {
        $user = Auth::user();
        // Retrieve the clients supported by the user and their related activities
        $clients = optional($user->managedClients)->where('active', true);
        $workers = User::all();

        // Eager load the related activityRates and activities
        $clients->load('activityRates.activity');

        // Prepare the $clientActivities variable in the desired format for JavaScript
        $clientActivities = [];
        foreach ($clients as $client) {
            $clientActivities[$client->id] = $client->activityRates->pluck('activity');
        }

        return view('manager/manageshifts.edit', compact('manageshift', 'workers', 'clients', 'clientActivities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShiftRequest $request, Shift $manageshift)
    {
        $manageshift->update($request->validated());

        return redirect()->route('manageshifts.show', $manageshift);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shift $manageshift)
    {
        $manageshift->delete();
        return redirect()->route('manageshifts.index');
    }

    public function approve($id)
    {
        $shift = Shift::find($id);

        if (!$shift) {
            return redirect()->route('manageshifts.index');
        }

        // Update the 'approved' field to true
        $shift->update(['approved' => true]);

        return redirect()->route('manageshifts.index');
    }

    public function unapprove($id)
    {
        $shift = Shift::find($id);

        if (!$shift) {
            return redirect()->route('manageshifts.index');
        }

        // Update the 'approved' field to true
        $shift->update(['approved' => false]);

        return redirect()->route('manageshifts.index');
    }

}
