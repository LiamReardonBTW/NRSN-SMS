<?php

namespace App\Http\Controllers\admin\invoicing;

use App\Http\Controllers\Controller;
use App\CustomClasses\CustomInvoiceItem;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use App\Models\Activity;
use App\Models\ActivityRate;
use App\Models\UserContract;
use App\Models\ClientContract;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use App\Models\Shift;
use App\Models\Invoice as DatabaseInvoice;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;



class InvoicingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get a list of clients and their uninvoiced shifts
        $clients = Client::whereHas('shifts', function ($query) {
            $query->where('approved', 1)->where('clientinvoice_id', null);
        })->get();

        // Get a list of workers and their uninvoiced shifts
        $workers = User::whereHas('shifts', function ($query) {
            $query->where('approved', 1)->where('workerinvoice_id', null);
        })->get();

        // Fetch pending client invoices
        $pendingClientInvoices = DatabaseInvoice::where('type', 'client')
            ->where('status', 'pending')
            ->get();

        // Fetch pending worker invoices
        $pendingWorkerInvoices = DatabaseInvoice::where('type', 'worker')
            ->where('status', 'pending')
            ->get();

        // Create an array to store the next invoice numbers for clients and workers
        $nextInvoiceNumbers = [
            'clients' => [],
            'workers' => [],
        ];

        foreach ($clients as $client) {
            $nextInvoiceNumber = DatabaseInvoice::where('type', 'client')
                ->where('recipient_id', $client->id)
                ->max('invoice_number') + 1;

            $nextInvoiceNumbers['clients'][$client->id] = $nextInvoiceNumber;
        }

        foreach ($workers as $worker) {
            $nextInvoiceNumber = DatabaseInvoice::where('type', 'worker')
                ->where('recipient_id', $worker->id)
                ->max('invoice_number') + 1;

            $nextInvoiceNumbers['workers'][$worker->id] = $nextInvoiceNumber;
        }

        return view('admin/invoicing.index', compact('clients', 'workers', 'pendingClientInvoices', 'pendingWorkerInvoices', 'nextInvoiceNumbers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/invoicing.create');
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
        return view('admin/invoicing.show');
    }

    public function showClientInvoice($invoicePath)
    {
        // Generate the full filesystem path for the invoice file
        $fullFilePath = Storage::disk('client_invoices')->path($invoicePath);

        // Check if the file exists
        if (file_exists($fullFilePath)) {
            // Return the file as a response
            return response()->file($fullFilePath);
        }

        // Handle the case where the file does not exist
        return abort(404, 'File not found');
    }

    public function showWorkerInvoice($invoicePath)
    {
        // Generate the full filesystem path for the invoice file
        $fullFilePath = Storage::disk('worker_invoices')->path($invoicePath);

        // Check if the file exists
        if (file_exists($fullFilePath)) {
            // Return the file as a response
            return response()->file($fullFilePath);
        }

        // Handle the case where the file does not exist
        return abort(404, 'File not found');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin/invoicing.edit');
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
    public function destroy(Invoice $invoice)
    {
        //
    }

    public function markAsPaid($id)
    {
        // Find the invoice by ID
        $invoice = DatabaseInvoice::findOrFail($id);

        // Check if the invoice status is 'pending' before marking as paid
        if ($invoice->status === 'pending') {
            // Update the status to 'paid'
            $invoice->status = 'paid';
            $invoice->save();

            // Optionally, you can add a success message here
            // to indicate that the invoice has been marked as paid.
        }

        // Redirect back to the invoice page or any other appropriate page
        return redirect()->back();
    }

    public function unmarkAsPaid($id)
    {
        // Find the invoice by ID
        $invoice = DatabaseInvoice::findOrFail($id);

        // Check if the invoice status is 'pending' before marking as paid
        if ($invoice->status === 'paid') {
            // Update the status to 'paid'
            $invoice->status = 'pending';
            $invoice->save();

            // Optionally, you can add a success message here
            // to indicate that the invoice has been marked as paid.
        }

        // Redirect back to the invoice page or any other appropriate page
        return redirect()->back();
    }

    public function archiveInvoice($id)
    {
        // Find the invoice by ID
        $invoice = DatabaseInvoice::findOrFail($id);

        // Check if the invoice status is 'pending' before marking as paid
        if ($invoice->status === 'paid') {
            // Update the status to 'paid'
            $invoice->status = 'archived';
            $invoice->save();

            // Optionally, you can add a success message here
            // to indicate that the invoice has been marked as paid.
        }

        // Redirect back to the invoice page or any other appropriate page
        return redirect()->back();
    }

    public function unarchiveInvoice($id)
    {
        // Find the invoice by ID
        $invoice = DatabaseInvoice::findOrFail($id);

        // Check if the invoice status is 'pending' before marking as paid
        if ($invoice->status === 'archived') {
            // Update the status to 'paid'
            $invoice->status = 'paid';
            $invoice->save();

            // Optionally, you can add a success message here
            // to indicate that the invoice has been marked as paid.
        }

        // Redirect back to the invoice page or any other appropriate page
        return redirect()->back();
    }

    public function generateClientInvoice(Request $request)
    {
        // Manually validate the request data
        $validator = Validator::make($request->all(), [
            'client_id' => 'required|exists:clients,id',
            'invoice_number' => [
                'nullable',
                'integer',
                Rule::unique('invoices')
                    ->where(function ($query) use ($request) {
                        return $query->where('type', 'client')
                            ->where('recipient_id', $request->input('client_id'));
                    }),
            ],
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->with('alert-fail', 'Error: The client already has an Invoice of this number.');
        }

        // Retrieve the client ID from the request
        $clientId = $request->input('client_id'); // Replace with your actual input field name
        $invoice_number = $request->input('invoice_number');
        // Find the client based on the client ID
        $client = Client::find($clientId);

        // Check if the client exists
        if (!$client) {
            return redirect()->back()->with('error', 'Client not found.');
        }

        // Determine the invoice number (either manually set or auto-generated)
        if ($invoice_number !== null) {
            // Manually set invoice number if provided
            $nextInvoiceNumber = $invoice_number;
        } else {
            // Find the next available invoice number for the client and type 'client'
            $nextInvoiceNumber = DatabaseInvoice::where('type', 'client')
                ->where('recipient_id', $client->id)
                ->max('invoice_number') + 1;
        }

        // Get uninvoiced shifts for the selected client
        $uninvoicedShifts = Shift::where('client_supported', $clientId)
            ->where('approved', 1)
            ->where('clientinvoice_id', null)
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
            $clientcontract = ClientContract::where('client_id', $shift->client_supported)
                ->where('active', 1)
                ->first();

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


            // Calculate total amount for kilometers
            $kmRate = $clientcontract->km_rate;
            $kmAmount = $shift->km * $kmRate;

            // Calculate kmHours (rounded up to the nearest 15 minutes)
            $kmHours = ceil(($kmAmount / $hourlyRate) / 0.25) * 0.25;

            // Calculate total amount for expenses
            $expensesAmount = $shift->expenses;
            $expensesHours = ceil(($expensesAmount / $hourlyRate) / 0.25) * 0.25;

            // Calculate the total quantity (hours + kilometers + expenses)
            $totalQuantity = $shift->hours + $kmHours + $expensesHours;

            $item = (new CustomInvoiceItem())
                ->title("$activity->activityname: $activity_code")
                ->description("$dayofshift $public_holiday_text - Hours: ".($shift->hours)." - Km: " . ($shift->km ?? 0) . " - Expenses: " . ($shift->expenses ?? 0))
                ->quantity($totalQuantity)
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
            ->filename("{$client->id}{$client->first_name}{$client->last_name}Invoice$nextInvoiceNumber");

        // Generate and save the PDF to the 'client_invoices' disk
        $pdf = $invoice->save('client_invoices');

        // Create an invoice for a client
        $clientInvoice = new DatabaseInvoice([
            'type' => 'client',
            'date' => now()->toDateString(),
            'totalamount' => $totalAmount,
            'status' => 'pending',
            'invoice_number' => $nextInvoiceNumber,
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
        // Manually validate the request data
        $validator = Validator::make($request->all(), [
            'worker_id' => 'required|exists:users,id',
            'invoice_number' => [
                'nullable',
                'integer',
                Rule::unique('invoices')
                    ->where(function ($query) use ($request) {
                        return $query->where('type', 'worker')
                            ->where('recipient_id', $request->input('worker_id'));
                    }),
            ],
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->with('alert-fail', 'Error: The client already has an Invoice of this number.');
        }

        // Retrieve the worker (user) ID from the request
        $workerId = $request->input('worker_id'); // Replace with your actual input field name
        $invoice_number = $request->input('invoice_number');
        // Find the worker (user) based on the worker ID
        $worker = User::find($workerId);

        // Check if the worker (user) exists
        if (!$worker) {
            return redirect()->back()->with('error', 'Worker not found.');
        }

        // Determine the invoice number (either manually set or auto-generated)
        if ($invoice_number !== null) {
            // Manually set invoice number if provided
            $nextInvoiceNumber = $invoice_number;
        } else {
            // Find the next available invoice number for the worker and type 'worker'
            $nextInvoiceNumber = DatabaseInvoice::where('type', 'worker')
                ->where('recipient_id', $worker->id)
                ->max('invoice_number') + 1;
        }
        // Get uninvoiced shifts for the selected worker (user)
        $uninvoicedShifts = Shift::where('submitted_by', $workerId)
            ->where('approved', 1)
            ->where('workerinvoice_id', null)
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

            if ($shift->is_public_holiday) {
                $hourlyRate = $workerrates->publicholidayhourlyrate;
                $public_holiday_text = " - Public Holiday";
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


            // Calculate the total quantity (hours + kilometers + expenses)
            $totalQuantity = $shift->hours;

            $item = (new CustomInvoiceItem())
                ->title("$clientsupported->first_name $clientsupported->last_name")
                ->description("$dayofshift $public_holiday_text - Hours: ".($shift->hours)." - Km: " . ($shift->km ?? 0) . "km - Expenses: $" . ($shift->expenses ?? 0))
                ->quantity($shift->hours)
                ->setDateOfShift($dateofshift)
                ->pricePerUnit($hourlyRate)
                ->subTotalPrice(($hourlyRate * $totalQuantity) + $expensesAmount + $kmAmount);
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
            ->filename("{$worker->id}{$worker->first_name}{$worker->last_name}Invoice$nextInvoiceNumber");

        // Generate and save the PDF to the 'client_invoices' disk
        $pdf = $invoice->save('worker_invoices');

        // Create an invoice for a worker
        $workerInvoice = new DatabaseInvoice([
            'type' => 'worker',
            'date' => now()->toDateString(),
            'totalamount' => $totalAmount,
            'status' => 'pending',
            'invoice_number' => $nextInvoiceNumber,
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
