<?php

namespace App\Http\Controllers\manager\manageshifts;

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

        return view('manager/manageshifts.index', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $workers = User::where('role', 2)->get();
        $clients = Client::all();
        $activities = Activity::All();
        return view('manager/manageshifts.create', compact('workers', 'clients', 'activities'));
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
        $workers = User::where('role', 2)->get();
        $clients = Client::all();
        $activities = Activity::All();
        return view('manager/manageshifts.edit', compact('manageshift', 'workers', 'clients', 'activities'));
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

    public function updateInvoiced(Request $request, $id)
    {
        // Find the shift by its ID
        $shift = Shift::findOrFail($id);

        // Update the 'invoiced' field to true
        $shift->update([
            'isinvoiced' => true,
        ]);

        // Optionally, you can add some validation and error handling here.

        // Redirect back to the page where you came from, or any other appropriate URL
        return redirect()->back()->with('success', 'Shift has been marked as invoiced.');
    }

}
