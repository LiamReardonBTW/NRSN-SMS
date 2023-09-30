<?php

namespace App\Http\Controllers\admin\invoices;

use App\Http\Controllers\Controller;
use App\CustomClasses\CustomInvoiceItem;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use App\Models\Activity;
use App\Models\ActivityRate;
use App\Models\UserContract;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use App\Models\Shift;
use App\Models\Invoice as DatabaseInvoice;
use Carbon\Carbon;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get a list of clients and their uninvoiced shifts
        $clients = Client::whereHas('shifts', function ($query) {
            $query->where('isinvoiced', 0)->where('approved', 1);
        })->get();

        // Get a list of workers and their uninvoiced shifts
        $workers = User::whereHas('shifts', function ($query) {
            $query->where('isinvoiced', 0)->where('approved', 1);
        })->get();

        return view('admin/invoices.index', compact('clients', 'workers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/invoices.create');
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
        return view('admin/invoices.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin/invoices.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function generateClientInvoice(Request $request)
    {
        // Retrieve the client ID from the request
        $clientId = $request->input('client_id'); // Replace with your actual input field name

        // Find the client based on the client ID
        $client = Client::find($clientId);

        //REPLACE WITH INVOICE INPUT FIELD NEXT TO GENERATE INVOICE BUTTON
        $invoice_number = 5;

        // Check if the client exists
        if (!$client) {
            return redirect()->back()->with('error', 'Client not found.');
        }

        // Get uninvoiced shifts for the selected client
        $uninvoicedShifts = Shift::where('client_supported', $clientId)
            ->where('isinvoiced', 0)
            ->where('approved', 1)
            ->get();

        // Check if there are uninvoiced shifts
        if ($uninvoicedShifts->isEmpty()) {
            return redirect()->back()->with('error', 'No uninvoiced shifts found for this client.');
        }

        // Create a new Party for the client
        $clientParty = new Party([
            'name' => $client->first_name . ' ' . $client->last_name,
            'phone' => $client->phone,
            // Add custom fields if needed
        ]);

        // Create a new Party for the customer (you can customize this)
        $customerParty = new Party([
            'name' => 'Northern Rivers Support Network',
            'address' => '12 Olives Rd, Northern Rivers',
            // Add custom fields if needed
        ]);

        // Create an array of InvoiceItems based on uninvoiced shifts
        $items = [];
        $totalAmount = 0;
        foreach ($uninvoicedShifts as $shift) {
            $activity = Activity::find($shift->activity_id);
            $activityrate = ActivityRate::where('client_id', $shift->client_supported)
                ->where('activity_id', $shift->activity_id)
                ->first();
            $dayofshift = $shift->date->format('l');
            $dateofshift = $shift->date->format('d/m/y');
            $public_holiday_text = ""; //Default no text
            $activity_code = ""; //

            if ($shift->is_public_holiday) {
                $hourlyRate = $activityrate->publicholidayhourlyrate;
                $public_holiday_text = "- Public Holiday";
                $activity_code = $activity->publicholidayhourlycode;
            } else {
                if ($dayofshift === 'Saturday') {
                    $hourlyRate = $activityrate->saturdayhourlyrate;
                    $activity_code = $activity->saturdayhourlycode;
                } elseif ($dayofshift === 'Sunday') {
                    $hourlyRate = $activityrate->sundayhourlyrate;
                    $activity_code = $activity->sundayhourlycode;
                } else {
                    $hourlyRate = $activityrate->weekdayhourlyrate;
                    $activity_code = $activity->weekdayhourlycode;
                }
            }

            $item = (new CustomInvoiceItem())
                ->title("$activity->activityname")
                ->description("$activity_code")
                ->quantity($shift->hours)
                ->setDateOfShift($dateofshift)
                ->pricePerUnit($hourlyRate);
            $items[] = $item;

            // Calculate and accumulate the total amount
            $totalAmount += $hourlyRate * $shift->hours;
        }

        // Create the invoice
        $invoice = Invoice::make('invoice')
            ->seller($customerParty)
            ->buyer($clientParty)
            ->dateFormat('d/m/y')
            ->currencySymbol('$')
            ->currencyCode('AUD')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->addItems($items)
            ->logo(public_path('images/nrsn-logo-new.png'))
            ->filename("{$client->id}{$client->first_name}{$client->last_name}Invoice$invoice_number");

        // Generate and save the PDF to the 'client_invoices' disk
        $pdf = $invoice->save('client_invoices');

        // Create an invoice for a client
        $clientInvoice = new DatabaseInvoice([
            'type' => 'client',
            'date' => now()->toDateString(),
            'totalamount' => $totalAmount,
            'status' => 'pending',
            'pdf_path' => $invoice->url(),
        ]);

        $clientInvoice->recipient()->associate($client);
        $clientInvoice->save();

        // Establish the relationship between shifts and the invoice
        foreach ($uninvoicedShifts as $shift) {
            $shift->clientinvoice_id = $clientInvoice->id; // Set the clientinvoice_id
            $shift->save();
        }

        // Return the PDF to the browser or have a different view
        return $pdf->stream();

    }
    public function generateWorkerInvoice(Request $request)
    {
        // Retrieve the worker (user) ID from the request
        $workerId = $request->input('worker_id'); // Replace with your actual input field name

        // Find the worker (user) based on the worker ID
        $worker = User::find($workerId);

        //REPLACE WITH INVOICE INPUT FIELD NEXT TO GENERATE INVOICE BUTTON
        $invoice_number = 5;

        // Check if the worker (user) exists
        if (!$worker) {
            return redirect()->back()->with('error', 'Worker not found.');
        }

        // Get uninvoiced shifts for the selected worker (user)
        $uninvoicedShifts = Shift::where('submitted_by', $workerId)
            ->where('isinvoiced', 0)
            ->where('approved', 1)
            ->get();

        // Check if there are uninvoiced shifts
        if ($uninvoicedShifts->isEmpty()) {
            return redirect()->back()->with('error', 'No uninvoiced shifts found for this worker.');
        }

        // Create a new Party for the worker
        $workerParty = new Party([
            'name' => $worker->first_name . ' ' . $worker->last_name,
            'phone' => $worker->phone,
            // Add custom fields if needed
        ]);

        // Create a new Party for the customer (you can customize this)
        $customerParty = new Party([
            'name' => 'Northern Rivers Support Network',
            'address' => '12 Olives Rd, Northern Rivers',
            // Add custom fields if needed
        ]);

        // Create an array of InvoiceItems based on uninvoiced shifts
        $items = [];
        $totalAmount = 0;
        foreach ($uninvoicedShifts as $shift) {
            $workerrates = UserContract::where('user_id', $shift->submitted_by)
                ->where('active', 1)
                ->first();
            $clientsupported = Client::where('id', $shift->client_supported)
                ->first();
            $dayofshift = $shift->date->format('l');
            $dateofshift = $shift->date->format('d/m/y');
            $public_holiday_text = ""; //Default no text

            if ($shift->is_public_holiday) {
                $hourlyRate = $workerrates->publicholidayhourlyrate;
                $public_holiday_text = "- Public Holiday";
            } else {
                if ($dayofshift === 'Saturday') {
                    $hourlyRate = $workerrates->saturdayhourlyrate;
                } elseif ($dayofshift === 'Sunday') {
                    $hourlyRate = $workerrates->sundayhourlyrate;
                } else {
                    $hourlyRate = $workerrates->weekdayhourlyrate;
                }
            }

            $item = (new CustomInvoiceItem())
                ->title("$clientsupported->first_name $clientsupported->last_name")
                ->description("$dayofshift $public_holiday_text ")
                ->quantity($shift->hours)
                ->setDateOfShift($dateofshift)
                ->pricePerUnit($hourlyRate);
            $items[] = $item;

            // Calculate and accumulate the total amount
            $totalAmount += $hourlyRate * $shift->hours;
        }

        // Create the invoice
        $invoice = Invoice::make('invoice')
            ->seller($customerParty)
            ->buyer($workerParty)
            ->dateFormat('d/m/y')
            ->currencySymbol('$')
            ->currencyCode('AUD')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->addItems($items)
            ->logo(public_path('images/nrsn-logo-new.png'))
            ->filename("{$worker->id}{$worker->first_name}{$worker->last_name}Invoice$invoice_number");

        // Generate and save the PDF to the 'client_invoices' disk
        $pdf = $invoice->save('worker_invoices');

        // Create an invoice for a worker
        $workerInvoice = new DatabaseInvoice([
            'type' => 'worker',
            'date' => now()->toDateString(),
            'totalamount' => $totalAmount,
            'status' => 'pending',
            'pdf_path' => $invoice->url(),
        ]);

        $workerInvoice->recipient()->associate($worker);
        $workerInvoice->save();

        // Establish the relationship between shifts and the invoice
        foreach ($uninvoicedShifts as $shift) {
            $shift->workerinvoice_id = $workerInvoice->id; // Set the workerinvoice_id
            $shift->save();
        }

        // Return the PDF to the browser or have a different view
        return $pdf->stream();
    }
}
