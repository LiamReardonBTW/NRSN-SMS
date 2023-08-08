<?php

namespace App\Http\Controllers\manager\manageshifts;

use Illuminate\Http\Request;
use App\Http\Requests\StoreShiftRequest;
use App\Http\Requests\UpdateShiftRequest;
use App\Models\Shift;
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
        return view('manager/manageshifts.create');
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
        return view('manager/manageshifts.show', compact('manageshift'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shift $manageshift)
    {
        return view('manager/manageshifts.edit', compact('manageshift'));
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
}