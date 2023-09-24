<?php

namespace App\Http\Controllers\admin\allclients;

use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\User;
use App\Models\Activity;
use App\Models\ActivityRate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        $clients = Client::all();

        return view('admin/allclients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/allclients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        Client::create($request->validated());

        return redirect()->route('allclients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $allclient)
    {
        return view('admin/allclients.show', compact('allclient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $allclient)
    {
        $allUsers = User::all();
        $allActivities = Activity::all();
        $allclient->load('activityRates');

        // Fetch activity rates for the client and attach them to the activities
        foreach ($allActivities as $activity) {
            $activityRate = $allclient->activityRates->where('activity_id', $activity->id)->first();
            $activity->setAttribute('activityRate', $activityRate);
        }

        return view('admin/allclients.edit', compact('allclient', 'allUsers', 'allActivities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $allclient)
    {
        $validatedData = $request->validated();

        // Handle supported clients
        if (isset($validatedData['supported_by'])) {
            foreach ($validatedData['supported_by'] as $userId) {
                // Check if the client is not already supported, then create the relationship
                if (!$allclient->supportedByUser->contains($userId)) {
                    $allclient->supportedByUser()->attach($userId, ['relation' => 'supported_by']);
                }
            }

            // Remove unsupported clients (clients that were supported but now unchecked)
            $unsupportedByUsers = $allclient->supportedByUser->pluck('id')->diff($validatedData['supported_by']);
            $allclient->supportedByUser()->detach($unsupportedByUsers);
        } else {
            // If no clients are selected, detach all supported clients
            $allclient->supportedByUser()->detach();
        }

        // Handle Managed clients
        if (isset($validatedData['managed_by'])) {
            foreach ($validatedData['managed_by'] as $userId) {
                // Check if the user is not already managing this client, then create the relationship
                if (!$allclient->managedByUser->contains($userId)) {
                    $allclient->managedByUser()->attach($userId, ['relation' => 'managed_by']);
                }
            }

            // Remove users who are no longer managing this client (users that were managing but now unchecked)
            $unmanagedByUsers = $allclient->managedByUser->pluck('id')->diff($validatedData['managed_by']);
            $allclient->managedByUser()->detach($unmanagedByUsers);
        } else {
            // If no users are selected, detach all users who were managing this client
            $allclient->managedByUser()->detach();
        }

        // Handle other user data updates
        $allclient->update($validatedData);

        return redirect()->route('allclients.show', $allclient);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $allclient)
    {
        $allclient->delete();
        return redirect()->route('allclients.index');
    }

    /**
     * Attach and detach activities for the specified client.
     */
    public function syncActivities(Request $request, Client $client)
    {
        $selectedActivities = $request->input('activities', []); // Get the selected activity IDs from the form
        $activityData = $request->input('rates', []); // Get the rates data from the form

        // Get the currently attached activities for this client
        $attachedActivities = $client->activityRates->pluck('activity_id')->toArray();

        // Iterate through the attached activities and detach if unticked
        foreach ($attachedActivities as $activityId) {
            if (!in_array($activityId, $selectedActivities)) {
                // Detach the activity
                $client->activityRates()
                    ->where('activity_id', $activityId)
                    ->delete();
            }
        }

        // Iterate through the selected activities and update/create the rates
        foreach ($selectedActivities as $activityId) {
            if (isset($activityData[$activityId])) {
                // Find the activityRate record for this client and activity (if it exists)
                $activityRate = $client->activityRates()
                    ->where('activity_id', $activityId)
                    ->first();

                // Update or create the activityRate record
                if ($activityRate) {
                    $activityRate->update($activityData[$activityId]);
                } else {
                    $activity = new ActivityRate($activityData[$activityId]);
                    $activity->activity_id = $activityId;
                    $client->activityRates()->save($activity);
                }
            }
        }

        return redirect()->route('allclients.show', $client);
    }

}
