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
    public function show(User $alluser)
    {
        return view('admin/allusers.show', compact('alluser'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $alluser)
    {
        return view('admin/allusers.edit', compact('alluser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $alluser)
    {
        $alluser->update($request->validated());

        return redirect()->route('allusers.show', $alluser);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $alluser)
    {
        $alluser->delete();
        return redirect()->route('allusers.index');
    }
}
