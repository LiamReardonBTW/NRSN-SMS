<?php

namespace App\Http\Controllers\worker\myshifts;

use Illuminate\Http\Request;
use App\Http\Requests\StoreShiftRequest;
use App\Http\Requests\UpdateShiftRequest;
use App\Models\Shift;
use App\Models\Activity;
use App\Models\Client;
use App\Models\UserContract;
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
        // Retrieve shifts associated with the currently logged-in user
        $user = Auth::user();
        $shifts = $user->shifts;

        $workerPays = [];

        foreach ($shifts as $shift) {

            // Calculate worker pay
            $workerPay = $this->calculateWorkerTotalPay($shift);

            // Store calculated values in arrays
            $workerPays[$shift->id] = $workerPay;
        }

        return view('worker/myshifts.index', compact('shifts', 'workerPays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Retrieve the clients supported by the user and their related activities
        $clients = optional($user->supportedClients)->load('activityRates.activity');

        // Apply the 'active' filter after loading the related models
        $clients = $clients->where('active', true);

        // Prepare the $clientActivities variable in the desired format for JavaScript
        $clientActivities = [];
        foreach ($clients as $client) {
            $clientActivities[$client->id] = $client->activityRates->pluck('activity');
        }

        return view('worker/myshifts.create', compact('clientActivities', 'clients'));
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
        $activities = Activity::All();
        // Check if the currently logged-in user is the 'submitted_by' user for this shift
        $user = Auth::user();
        if ($myshift->submitted_by !== $user->id) {
            // Redirect to a different page or show an error message
            return redirect()->route('myshifts.index'); // Replace with your desired route or action
        }

        // Calculate worker pay
        $workerPay = $this->calculateWorkerTotalPay($myshift);

        // Store calculated values in arrays
        $workerPays[$myshift->id] = $workerPay;

        return view('worker/myshifts.show', compact('myshift', 'activities', 'workerPays'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shift $myshift)
    {
        // Check if the currently logged-in user is the 'submitted_by' user for this shift
        $user = Auth::user();
        if ($myshift->submitted_by !== $user->id) {
            // Redirect to a different page or show an error message
            return redirect()->route('myshifts.index'); // Replace with your desired route or action
        }

        // Retrieve the clients supported by the user and their related activities
        $clients = optional($user->supportedClients)->where('active', true);

        // Eager load the related activityRates and activities
        $clients->load('activityRates.activity');

        // Prepare the $clientActivities variable in the desired format for JavaScript
        $clientActivities = [];
        foreach ($clients as $client) {
            $clientActivities[$client->id] = $client->activityRates->pluck('activity');
        }

        // Calculate worker pay
        $workerPay = $this->calculateWorkerTotalPay($myshift);

        // Store calculated values in arrays
        $workerPays[$myshift->id] = $workerPay;

        return view('worker/myshifts.edit', compact('myshift', 'clientActivities', 'workerPays'));
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

    private function calculateWorkerTotalPay($shift)
    {
        $workerrates = UserContract::where('user_id', $shift->submitted_by)
            ->where('active', 1)
            ->first();
        $dayofshift = $shift->date->format('l');

        if ($shift->is_public_holiday) {
            $hourlyRate = $workerrates->publicholidayhourlyrate;
        } else {
            if ($dayofshift === 'Saturday') {
                $hourlyRate = $workerrates->saturdayhourlyrate;
            } elseif ($dayofshift === 'Sunday') {
                $hourlyRate = $workerrates->sundayhourlyrate;
            } else {
                $hourlyRate = $workerrates->weekdayhourlyrate;
            }
        }

        // Calculate total amount for kilometers
        $kmRate = $workerrates->km_rate;
        $kmAmount = $shift->km * $kmRate;

        // Calculate total amount for expenses
        $expensesAmount = $shift->expenses;

        $totalQuantity = $shift->hours;

        // Calculate the total pay for this shift
        $workerPays = $totalQuantity * $hourlyRate + $kmAmount + $expensesAmount;

        return number_format($workerPays, 2);
    }

}
