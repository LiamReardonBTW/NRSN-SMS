<?php

namespace App\Http\Controllers\admin\allusers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        $users = User::all();

        return view('admin/allusers.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/allusers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('allusers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, $id)
    {
        $selectedUser = User::find($id);

        if ($selectedUser === null) {
            return redirect()->route('allusers.index');
         }
        else
        {
        return view('admin/allusers.show', compact('selectedUser'));
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, $id)
    {
        $selectedUser = User::find($id);

        if ($selectedUser === null) {
            return redirect()->route('allusers.index');
         }
        else
        {
        return view('admin/allusers.edit', compact('selectedUser'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user, $id)
    {
        User::where('id', $id )->update(
            ($request->validated()));

        return redirect()->route('allusers.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id)
    {
        User::destroy($id);
        return redirect()->route('allusers.index');
    }
}
