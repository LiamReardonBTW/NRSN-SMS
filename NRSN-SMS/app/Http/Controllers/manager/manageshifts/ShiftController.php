<?php

namespace App\Http\Controllers\manager\manageshifts;

use Illuminate\Http\Request;
use App\Http\Requests\StoreShiftRequest;
use App\Http\Requests\UpdateShiftRequest;
use App\Models\Shift;
use App\Models\Activity;
use App\Models\Client;
use App\Models\User;
use App\Models\UserContract;
use App\Models\ClientContract;
use App\Models\ActivityRate;
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

        // Initialize arrays to store calculated values for each shift
        $clientPays = [];
        $workerPays = [];

        foreach ($shifts as $shift) {
            // Calculate client pay
            $clientPay = $this->calculateClientTotalPay($shift);

            // Calculate worker pay
            $workerPay = $this->calculateWorkerTotalPay($shift);

            // Store calculated values in arrays
            $clientPays[$shift->id] = $clientPay;
            $workerPays[$shift->id] = $workerPay;
        }

        return view('manager/manageshifts.index', compact('shifts', 'clientPays', 'workerPays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get the authenticated user
        $user = Auth::user();
        $workers = User::where('role', '2')->get();

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

        // Calculate Client Pay
        $clientPay = $this->calculateClientTotalPay($manageshift);

        // Calculate worker pay
        $workerPay = $this->calculateWorkerTotalPay($manageshift);

        // Store calculated values in arrays
        $clientPays[$manageshift->id] = $clientPay;
        $workerPays[$manageshift->id] = $workerPay;

        return view('manager/manageshifts.show', compact('activities', 'manageshift', 'clientPays', 'workerPays'));
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

        // Calculate Client Pay
        $clientPay = $this->calculateClientTotalPay($manageshift);

        // Calculate worker pay
        $workerPay = $this->calculateWorkerTotalPay($manageshift);

        // Store calculated values in arrays
        $clientPays[$manageshift->id] = $clientPay;
        $workerPays[$manageshift->id] = $workerPay;

        return view('manager/manageshifts.edit', compact('manageshift', 'workers', 'clients', 'clientActivities', 'clientPays', 'workerPays'));
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

    private function calculateClientTotalPay($shift)
    {
        $dayofshift = $shift->date->format('l');

        $activityrate = ActivityRate::where('client_id', $shift->client_supported)
            ->where('activity_id', $shift->activity_id)
            ->first();

        $clientcontract = ClientContract::where('client_id', $shift->client_supported)
            ->where('active', 1)
            ->first();

        if ($shift->is_public_holiday) {
            $hourlyRate = $activityrate->publicholidayhourlyrate;
        } else {
            if ($dayofshift === 'Saturday') {
                $hourlyRate = $activityrate->saturdayhourlyrate;
            } elseif ($dayofshift === 'Sunday') {
                $hourlyRate = $activityrate->sundayhourlyrate;
            } else {
                $hourlyRate = $activityrate->weekdayhourlyrate;
            }
        }

        $kmRate = $clientcontract->km_rate;
        $kmAmount = $shift->km * $kmRate;

        $kmHours = ceil($kmAmount / $hourlyRate / 0.25) * 0.25;

        $expensesAmount = $shift->expenses;
        $expensesHours = ceil($expensesAmount / $hourlyRate / 0.25) * 0.25;

        $totalQuantity = $shift->hours + $kmHours + $expensesHours;

        // Calculate the total pay for this shift
        $clientPays = $totalQuantity * $hourlyRate;

        return number_format($clientPays, 2);
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
