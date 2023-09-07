<?php

namespace App\Http\Controllers\admin\allusers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Http\Controllers\Controller;

class UserClientController extends Controller
{
    public function attachClient(User $alluser, Client $client)
    {
        $alluser->clients()->attach($client->id);
        return redirect()->route('allusers.show', $alluser)->with('success', 'Client attached successfully.');
    }

    public function detachClient(User $alluser, Client $client)
    {
        $alluser->clients()->detach($client->id);
        return redirect()->route('allusers.show', $alluser)->with('success', 'Client detached successfully.');
    }

    public function syncClients(Request $request, User $alluser)
    {
        $clientIds = $request->input('client_ids', []);
        $alluser->clients()->sync($clientIds);
        return redirect()->route('allusers.show', $alluser)->with('success', 'Clients synchronized successfully.');
    }
}
