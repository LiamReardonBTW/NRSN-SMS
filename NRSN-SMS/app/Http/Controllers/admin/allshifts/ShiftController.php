<?php

namespace App\Http\Controllers\admin\allshifts;

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

        return view('admin/allshifts.index', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/allshifts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShiftRequest $request)
    {
        Shift::create($request->validated());

        return redirect()->route('allshifts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shift $allshift)
    {
        return view('admin/allshifts.show', compact('allshift'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shift $allshift)
    {
        return view('admin/allshifts.edit', compact('allshift'));
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
}
