<?php

namespace App\Http\Controllers\Admin\usercontracts;

use App\Http\Requests\StoreUserContractRequest;
use App\Http\Requests\UpdateUserContractRequest;
use App\Models\User;
use App\Models\UserContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usercontracts = UserContract::all();

        return view('admin/usercontracts.index', compact('usercontracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserContract $usercontract)
    {
        return view('admin.usercontracts.show', compact('usercontract'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserContract $usercontract)
    {
        $allUsers = User::all();
        return view('admin/usercontracts.edit', compact('usercontract', 'allUsers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserContractRequest $request, UserContract $usercontract)
    {
        $validatedData = $request->validated();
        $usercontract->update($validatedData);

        return redirect()->route('usercontracts.show', $usercontract);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
