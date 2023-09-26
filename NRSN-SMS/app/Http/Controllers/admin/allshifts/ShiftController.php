<?php

namespace App\Http\Controllers\admin\allshifts;

use Illuminate\Http\Request;
use App\Http\Requests\StoreShiftRequest;
use App\Http\Requests\UpdateShiftRequest;
use App\Models\Shift;
use App\Models\User;
use App\Models\Client;
use App\Models\Activity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        $shifts = Shift::all();

        return view('admin/allshifts.index', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get the authenticated user
        $workers = User::all();

        // Retrieve the clients supported by the user and their related activities
        $clients = Client::whereHas('activityRates.activity')->get();

        // Apply the 'active' filter after loading the related models
        $clients = $clients->where('active', true);

        // Prepare the $clientActivities variable in the desired format for JavaScript
        $clientActivities = [];
        foreach ($clients as $client) {
            $clientActivities[$client->id] = $client->activityRates->pluck('activity');
        }
        return view('admin/allshifts.create', compact('workers', 'clients', 'clientActivities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShiftRequest $request)
    {
        Shift::create($request->validated());
        $activities = Activity::All();
        return redirect()->route('allshifts.index', compact('activities'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Shift $allshift)
    {
        $activities = Activity::All();
        return view('admin/allshifts.show', compact('allshift', 'activities'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shift $allshift)
    {
        $workers = User::all();
        $clients = Client::all();
        $activities = Activity::All();

        // Eager load the related activityRates and activities
        $clients->load('activityRates.activity');

        // Prepare the $clientActivities variable in the desired format for JavaScript
        $clientActivities = [];
        foreach ($clients as $client) {
            $clientActivities[$client->id] = $client->activityRates->pluck('activity');
        }

        return view('admin/allshifts.edit', compact('allshift', 'workers', 'clients', 'clientActivities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShiftRequest $request, Shift $allshift)
    {
        $allshift->update($request->validated());
        return redirect()->route('allshifts.show', $allshift);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shift $allshift)
    {
        $allshift->delete();
        return redirect()->route('allshifts.index');
    }


    public function approve($id)
    {
        $shift = Shift::find($id);

        if (!$shift) {
            return redirect()->route('allshifts.index');
        }

        // Update the 'approved' field to true
        $shift->update(['approved' => true]);

        return redirect()->route('allshifts.index');
    }

    public function unapprove($id)
    {
        $shift = Shift::find($id);

        if (!$shift) {
            return redirect()->route('allshifts.index');
        }

        // Update the 'approved' field to true
        $shift->update(['approved' => false]);

        return redirect()->route('allshifts.index');
    }

    public function updateInvoiced(Request $request, $id)
    {
        // Find the shift by its ID
        $shift = Shift::findOrFail($id);

        // Update the 'invoiced' field to true
        $shift->update([
            'isinvoiced' => true,
        ]);

        // Redirect back to the page where you came from, or any other appropriate URL
        return redirect()->route('allshifts.index');
    }

    public function markPaid($id)
    {
        $shift = Shift::find($id);

        if (!$shift) {
            return redirect()->route('allshifts.index');
        }

        // Update the 'approved' field to true
        $shift->update(['paid' => true]);

        return redirect()->route('allshifts.index');
    }

    public function unmarkPaid($id)
    {
        $shift = Shift::find($id);

        if (!$shift) {
            return redirect()->route('allshifts.index');
        }

        // Update the 'approved' field to true
        $shift->update(['paid' => false]);

        return redirect()->route('allshifts.index');
    }

}
