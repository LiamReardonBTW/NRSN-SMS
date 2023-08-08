<?php

namespace App\Http\Controllers\worker\myshifts;

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

        return view('worker/myshifts.index', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('worker/myshifts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShiftRequest $request)
    {
        Shift::create($request->validated());

        return redirect()->route('myshifts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shift $myshift)
    {
        return view('worker/myshifts.show', compact('myshift'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shift $myshift)
    {
        return view('worker/myshifts.edit', compact('myshift'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShiftRequest $request, Shift $myshift)
    {
        $myshift->update($request->validated());

        return redirect()->route('myshifts.show', $myshift);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shift $myshift)
    {
        $myshift->delete();
        return redirect()->route('myshifts.index');
    }
}
