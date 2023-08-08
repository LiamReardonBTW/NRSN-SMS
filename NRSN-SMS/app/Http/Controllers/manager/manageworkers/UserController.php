<?php

namespace App\Http\Controllers\admin\manageworkers;

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
        $workers = User::where('role','2')->get();

        return view('admin/manageworkers.index', compact('workers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/manageworkers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        User::create($request->validated());

        return redirect()->route('manageworkers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $manageworker)
    {

        return view('admin/manageworkers.show', compact('manageworker'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $manageworker)
    {
        // dd($manageworker);
        return view('admin/manageworkers.edit', compact('manageworker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $manageworker)
    {
        $manageworker->update($request->validated());
        // dd($manageworker);
        return redirect()->route('manageworkers.show', $manageworker);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $manageworker)
    {
        $manageworker->delete();
        return redirect()->route('manageworkers.index');
    }
}
