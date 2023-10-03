<?php

namespace App\Http\Controllers\admin\businessdetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessDetail;

class BusinessDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve business details from the database, assuming you have a BusinessDetail model
        $businessDetails = BusinessDetail::first(); // You may need to adjust the query to match your data

        // Check if business details were found
        if (!$businessDetails) {
            return redirect()->route('dashboard')->with('error', 'Business details not found.');
        }

        // Pass the business details to the view
        return view('admin/businessdetail.index', compact('businessDetails'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessDetail $businessDetail)
    {
        $businessDetails = BusinessDetail::first(); // You may need to adjust the query to match your data

        // Check if business details were found
        if (!$businessDetails) {
            return redirect()->route('dashboard')->with('error', 'Business details not found.');
        }
        return view('admin/businessdetail.edit', compact('businessDetails'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessDetail $businessDetail)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'tfn' => 'required|string|max:20',
            'abn' => 'required|string|max:20',
            'bankname' => 'required|string|max:255',
            'bankaddress' => 'required|string|max:255',
            'bankaccountnumber' => 'required|string|max:20|min:10',
            'bankbsbnumber' => 'required|string|max:7|min:7',
        ]);

        // Update the business details with the validated data
        $businessDetail->update($validatedData);

        // Redirect to a view or route after updating
        return redirect()->route('business-details.index')->with('success', 'Business details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
