<x-app-layout>
    <!-- Page Header Title -->
    <x-slot name="header">
        {{ __('Invoicing') }}
    </x-slot>

    <!-- Client Invoices Table Container -->
    <h2 class="text-2xl font-semibold bg-green-400 rounded-t-md py-4 px-3">Clients:</h2>
    <div class="bg-green-200 p-3 pb-12 rounded-b-md">
        <h2 class="text-xl font-semibold mb-2 py-4">Ready to invoice:</h2>
        <div class="relative overflow-auto border-2 border-blue-600 rounded mx-5"
            style="max-height: 600px; overflow-y: auto;">
            <!-- Client Invoices Table -->
            <table class="w-full text-left text-gray-800 bg-gray-100">
                <!-- Table Headers -->
                <thead class="text-xs uppercase text-gray-50 bg-blue-800">
                    <tr>
                        <!-- Client Name Table Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                            <div class="flex items-center">
                                Name
                                <!-- Sort By Name Button -->
                                <a href="#">
                                    <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <!-- Sort icon -->
                                    </svg>
                                </a>
                            </div>
                        </th>

                        <!-- Total Uninvoiced Shifts Table Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                            <div class="flex items-center">
                                Total Uninvoiced Shifts
                                <!-- Sort By Total Uninvoiced Shifts Button -->
                                <a href="#">
                                    <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <!-- Sort icon -->
                                    </svg>
                                </a>
                            </div>
                        </th>

                        <!-- Actions Table Header (For view/edit/delete buttons) -->
                        <th scope="col" class="text-right px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                            <span class="mr-28">Actions</span>
                        </th>

                    </tr>
                </thead>

                <!-- Table Content -->
                <tbody class="text-xs font-bold">
                    <!-- Loop through clients/workers and display their information -->
                    @foreach ($clients as $client)
                        <div>
                            <tr
                                class="even:bg-gray-100 odd:bg-gray-200 hover:bg-blue-300 border-y-8 border-opacity-0  h-12 text-center">
                                <!-- Client/Worker Information -->
                                <td scope="row" class="px-1 py-1 w-32">
                                    {{ $client->first_name }} {{ $client->last_name }}
                                <td scope="row" class="px-1 py-6">
                                    @foreach ($client->shifts->where('approved', 1)->where('clientinvoice_id', null) as $shift)
                                        <div class="rounded-md hover:bg-blue-400 grid grid-cols-6 gap-2 w-full text-sm items-center my-3 border-y border-x border-gray-400  "
                                            style="grid-template-columns: 1fr 2fr 1fr 1fr 1fr 1fr;">
                                            <div class="px-2">
                                                <strong>Select</strong><br>
                                                <input type="checkbox" name="selected_shifts[]"
                                                    value="{{ $shift->id }}" class="shift-checkbox">
                                            </div>
                                            <div class="px-2">
                                                <strong>Activity</strong><br>
                                                <span class="text-xs">{{ $shift->activity->activityname }}</span>
                                            </div>

                                            <div class="px-2">
                                                <strong>Hours</strong><br>
                                                {{ $shift->hours }}
                                            </div>

                                            <div class="px-2">
                                                <strong>Km</strong><br>
                                                {{ $shift->km ?? 0 }}
                                            </div>

                                            <div class="px-2">
                                                <strong>Expenses</strong><br>
                                                {{ $shift->expenses ?? 0 }}
                                            </div>

                                            <div class="px-2 ">
                                                <strong>Total</strong><br>
                                                <span class="text-lg">{{ $shift->client_total_pay }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                                <!-- Add the "select for client invoicing" button -->
                                <td scope="row">
                                    <button
                                        class="select-for-client-invoicing text-white inline-block text-lg p-2 bg-blue-600 rounded hover:shadow-xl hover:bg-blue-500"
                                        data-client-id="{{ $client->id }}">Select
                                        for Invoicing</button>
                                </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Generate Invoice Button with Form (outside the loop) -->
        <form action="{{ route('generate.client-invoice') }}" method="POST" target="_blank">
            @csrf
            <input type="hidden" name="client_id" id="client-id-input" value="">
            <input type="hidden" name="selected_shifts" id="selected-shifts-input" value="[]">

            <div class="text-black flex items-center grid-cols-1 w-1/2 mt-6 grid  mx-4">
                <!-- Client Invoice Buttons -->
                <button type="button"
                    class="text-white set-invoice-number-button inline-block p-2 mx-1 bg-blue-600 rounded-t-md hover:shadow-xl hover:bg-blue-500">
                    Set Invoice Number <span class="text-xs">&#9660;</span>
                </button>
                <input type="text" name="invoice_number"
                    class="invoice-number-field hidden text-sm text-center px-2 mx-1 border-gray-50"
                    placeholder="Invoice #:">
                <button
                    class="generate-client-invoice-button text-white inline-block p-5 mx-1 bg-green-600 rounded-b-md hover:shadow-xl hover:bg-green-500"
                    data-type="client">Generate Client Invoice</button>
            </div>
        </form>

        <!-- Add this section for Client Invoices -->
        <h2 class="text-xl font-semibold my-6">Pending Payment:</h2>
        <div class="relative overflow-auto border-2 border-blue-600 rounded mx-5"
            style="max-height: 300px; overflow-y: auto;">
            <table class="w-full text-left text-gray-800 bg-gray-100">
                <!-- Table Headers -->
                <thead class="text-xs uppercase text-gray-50 bg-blue-800">
                    <tr>
                        <!-- Client Name Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            Client Name
                        </th>

                        <!-- Invoice Number Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            Invoice Number
                        </th>

                        <!-- Invoice Number Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            Date
                        </th>

                        <!-- Invoice Number Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            Total Amount
                        </th>

                        <!-- Actions Header (For view/download buttons) -->
                        <th scope="col" class="w-48 text-right px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            <span class="mr-28">Actions</span>
                        </th>
                    </tr>
                </thead>

                <!-- Table Content -->
                <tbody class="text-xs font-bold">
                    <!-- Loop through pending client invoices and display their information -->
                    @foreach ($pendingClientInvoices as $invoice)
                        <tr class="even:bg-gray-100 odd:bg-gray-200 hover:bg-gray-300 h-12 text-center">
                            <!-- Invoice Information -->
                            <td scope="row" class="px-1 py-1">
                                <!-- Retrieve and display the recipient's first_name and last_name -->
                                @if ($invoice->recipient)
                                    {{ $invoice->recipient->first_name }} {{ $invoice->recipient->last_name }}
                                @else
                                    N/A <!-- Handle the case when recipient is not found -->
                                @endif
                            </td>
                            <td scope="row" class="px-1 py-1">
                                {{ $invoice->invoice_number }}
                            </td>
                            <td scope="row" class="px-1 py-1">
                                {{ $invoice->date }}
                            </td>
                            <td scope="row" class="px-1 py-1">
                                {{ $invoice->totalamount }}
                            </td>
                            <td class="whitespace-nowrap text-sm text-white font-bold float-right py-2">
                                <div class="flex">
                                    <!-- View Invoice Button -->
                                    <a href="{{ $invoice->pdf_path }}" target="_blank"
                                        class="inline-block px-2 m-1 py-1 bg-green-600 text-white rounded hover:bg-green-500">
                                        View Invoice
                                    </a>
                                    @if ($invoice->status === 'pending')
                                        <form method="POST"
                                            action="{{ route('markInvoiceAsPaid', ['id' => $invoice->id]) }}">
                                            @csrf
                                            <button type="submit"
                                                class="inline-block px-2 m-1 py-1 bg-blue-600 text-white rounded hover:bg-blue-500">
                                                Mark as Paid
                                            </button>
                                        </form>
                                    @elseif ($invoice->status === 'paid')
                                        <form method="POST"
                                            action="{{ route('unmarkInvoiceAsPaid', ['id' => $invoice->id]) }}">
                                            @csrf
                                            <button type="submit"
                                                class="inline-block px-2 m-1 py-1 bg-orange-400 text-white rounded hover:bg-orange-300">
                                                Unmark Paid
                                            </button>
                                        </form>
                                    @endif
                                </div>
                                <div class="">
                                    @if ($invoice->status === 'pending')
                                        <form method="POST" action="{{ route('allinvoices.destroy', $invoice) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-block px-2 m-1 py-1 bg-red-600 text-white rounded hover:bg-red-500">Undo
                                                Invoice
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <!-- Worker Invoices Table Container -->
    <h2 class="text-2xl font-semibold bg-blue-400 rounded-t-md py-4 mt-12 px-3">Workers:</h2>
    <div class="bg-blue-200 p-3 pb-12 rounded-b-md">
        <h2 class="text-xl font-semibold mb-2 py-4">Ready to invoice:</h2>
        <div class="relative overflow-auto border-2 border-blue-600 rounded mx-5"
            style="max-height: 600px; overflow-y: auto;">
            <!-- Worker Invoices Table -->
            <table class="w-full text-left text-gray-800 bg-gray-100">
                <!-- Table Headers -->
                <thead class="text-xs uppercase text-gray-50 bg-blue-800">
                    <tr>
                        <!-- Worker Name Table Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                            <div class="flex items-center">
                                Name
                                <!-- Sort By Name Button -->
                                <a href="#">
                                    <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <!-- Sort icon -->
                                    </svg>
                                </a>
                            </div>
                        </th>

                        <!-- Total Uninvoiced Shifts Table Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                            <div class="flex items-center">
                                Total Uninvoiced Shifts
                                <!-- Sort By Total Uninvoiced Shifts Button -->
                                <a href="#">
                                    <svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <!-- Sort icon -->
                                    </svg>
                                </a>
                            </div>
                        </th>
                        <!-- Actions Table Header (For view/edit/delete buttons) -->
                        <th scope="col" class="text-right px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                            <span class="mr-28">Actions</span>
                        </th>
                    </tr>
                </thead>

                <!-- Table Content -->
                <tbody class="text-sm font-bold">
                    <!-- Loop through workers and display their information -->
                    @foreach ($workers as $worker)
                        <tr
                            class="even:bg-gray-100 odd:bg-gray-200 hover:bg-blue-300 border-y-8 border-opacity-0  h-12 text-center">
                            <!-- Worker Information -->
                            <td scope="row" class="px-1 py-1 w-32">
                                {{ $worker->first_name }} {{ $worker->last_name }}
                            </td>
                            <td scope="row" class="px-1 py-6">
                                @foreach ($worker->shifts->where('approved', 1)->where('workerinvoice_id', null) as $shift)
                                    <div class="rounded-md hover:bg-blue-400 grid grid-cols-6 gap-2 w-full text-sm items-center my-3 border-y border-x border-gray-400  "
                                        style="grid-template-columns: 1fr 2fr 1fr 1fr 1fr 1fr;">
                                        <div class="px-2">
                                            <strong>Select</strong><br>
                                            <input type="checkbox" name="selected_worker_shifts[]"
                                                value="{{ $shift->id }}" class="worker-shift-checkbox">
                                        </div>
                                        <div class="px-2">
                                            <strong>Client Supported</strong><br>
                                            {{ $shift->clientSupported->first_name }}
                                            {{ $shift->clientSupported->last_name }}
                                        </div>
                                        <div class="px-2">
                                            <strong>Hours</strong><br>
                                            {{ $shift->hours }}
                                        </div>
                                        <div class="px-2">
                                            <strong>Km</strong><br>
                                            {{ $shift->km ?? 0 }}
                                        </div>
                                        <div class="px-2">
                                            <strong>Expenses</strong><br>
                                            {{ $shift->expenses ?? 0 }}
                                        </div>
                                        <div class="px-2">
                                            <strong>Total Pay</strong><br>
                                            <span class="text-lg">{{ $shift->worker_total_pay }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </td>
                            <!-- Add the "select for worker invoicing" button -->
                            <td scope="row">
                                <button
                                    class="select-for-worker-invoicing text-white inline-block text-lg p-2 bg-blue-600 rounded hover:shadow-xl hover:bg-blue-500"
                                    data-worker-id="{{ $worker->id }}">Select for Invoicing</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Generate Invoice Button with Form (outside the loop) -->
        <form action="{{ route('generate.worker-invoice') }}" method="POST" target="_blank">
            @csrf
            <input type="hidden" name="worker_id" id="worker-id-input" value="">
            <input type="hidden" name="selected_worker_shifts" id="selected-worker-shifts-input" value="">

            <div class="text-black flex items-center grid-cols-1 w-1/2 mt-6 grid  mx-4">
                <!-- Client Invoice Buttons -->
                <button type="button"
                    class="text-white set-invoice-number-button inline-block p-2 mx-1 bg-blue-600 rounded-t-md hover:shadow-xl hover:bg-blue-500">
                    Set Invoice Number <span class="text-xs">&#9660;</span>
                </button>
                <input type="text" name="invoice_number"
                    class="invoice-number-field hidden text-sm text-center px-2 mx-1 border-gray-50"
                    placeholder="Invoice #:">
                <button
                    class="generate-worker-invoice-button text-white inline-block p-5 mx-1 bg-green-600 rounded-b-md hover:shadow-xl hover:bg-green-500"
                    data-type="worker">Generate Worker Invoice</button>

            </div>
        </form>

        <!-- Add this section for Worker Invoices -->
        <h2 class="text-xl font-semibold my-6">Pending Payment:</h2>
        <div class="relative overflow-auto border-2 border-blue-600 rounded mx-5"
            style="max-height: 300px; overflow-y: auto;">
            <table class="w-full text-left text-gray-800 bg-gray-100">
                <!-- Table Headers -->
                <thead class="text-xs uppercase text-gray-50 bg-blue-800">
                    <tr>
                        <!-- Worker Name Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            Worker Name
                        </th>

                        <!-- Invoice Number Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            Invoice Number
                        </th>

                        <!-- Date Number Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            Date
                        </th>

                        <!-- Total Number Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            Total Amount
                        </th>

                        <!-- Actions Header (For view/download buttons) -->
                        <th scope="col" class="w-48 text-right px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            <span class="mr-28">Actions</span>
                        </th>
                    </tr>
                </thead>

                <!-- Table Content -->
                <tbody class="text-xs font-bold">
                    <!-- Loop through pending worker invoices and display their information -->
                    @foreach ($pendingWorkerInvoices as $invoice)
                        <tr class="even:bg-gray-100 odd:bg-gray-200 hover:bg-gray-300 h-12 text-center">
                            <!-- Invoice Information -->
                            <td scope="row" class="px-1 py-1">
                                <!-- Retrieve and display the recipient's first_name and last_name -->
                                @if ($invoice->recipient)
                                    {{ $invoice->recipient->first_name }} {{ $invoice->recipient->last_name }}
                                @else
                                    N/A <!-- Handle the case when recipient is not found -->
                                @endif
                            </td>
                            <td scope="row" class="px-1 py-1">
                                {{ $invoice->invoice_number }}
                            </td>
                            <td scope="row" class="px-1 py-1">
                                {{ $invoice->date }}
                            </td>
                            <td scope="row" class="px-1 py-1">
                                {{ $invoice->totalamount }}
                            </td>
                            <td class="whitespace-nowrap text-sm text-white font-bold float-right py-2">
                                <div class="flex">
                                    <!-- View Invoice Button -->
                                    <a href="{{ $invoice->pdf_path }}" target="_blank"
                                        class="inline-block px-2 m-1 py-1 bg-green-600 text-white rounded hover:bg-green-500">
                                        View Invoice
                                    </a>
                                    @if ($invoice->status === 'pending')
                                        <form method="POST"
                                            action="{{ route('markInvoiceAsPaid', ['id' => $invoice->id]) }}">
                                            @csrf
                                            <button type="submit"
                                                class="inline-block px-2 m-1 py-1 bg-blue-600 text-white rounded hover:bg-blue-500">
                                                Mark as Paid
                                            </button>
                                        </form>
                                    @elseif ($invoice->status === 'paid')
                                        <form method="POST"
                                            action="{{ route('unmarkInvoiceAsPaid', ['id' => $invoice->id]) }}">
                                            @csrf
                                            <button type="submit"
                                                class="inline-block px-2 m-1 py-1 bg-orange-400 text-white rounded hover:bg-orange-300">
                                                Unmark Paid
                                            </button>
                                        </form>
                                    @endif
                                </div>
                                <div class="">
                                    @if ($invoice->status === 'pending')
                                        <form method="POST" action="{{ route('allinvoices.destroy', $invoice) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-block px-2 m-1 py-1 bg-red-600 text-white rounded hover:bg-red-500">Undo
                                                Invoice
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <!-- Page Navigation Buttons -->
    <div class="block pb-12 pt-12">
        <!-- Back to Dashboard -->
        <a href="{{ route('dashboard') }}"
            class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
            Back
        </a>
        <a href="{{ route('allinvoices.index') }}"
            class="inline-flex items-center m-6 px-6 py-4 bg-blue-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-blue-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
            View All Invoices
        </a>
    </div>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const generateClientInvoiceButtons = document.querySelectorAll('.generate-client-invoice-button');
        const generateWorkerInvoiceButtons = document.querySelectorAll('.generate-worker-invoice-button');
        const setInvoiceNumberButtons = document.querySelectorAll('.set-invoice-number-button');
        const invoiceNumberFields = document.querySelectorAll('.invoice-number-field');
        const clientIdInput = document.getElementById('client-id-input'); // Get the client ID input element
        const workerIdInput = document.getElementById('worker-id-input'); // Get the worker ID input element
        const selectForClientInvoicingButtons = document.querySelectorAll('.select-for-client-invoicing');
        const selectForWorkerInvoicingButtons = document.querySelectorAll('.select-for-worker-invoicing');
        const selectedShiftsInput = document.getElementById('selected-shifts-input');
        const selectedWorkerShiftsInput = document.getElementById('selected-worker-shifts-input');

        // Event listeners for client invoice generation
        generateClientInvoiceButtons.forEach(button => {
            button.addEventListener('click', function() {
                handleInvoiceGeneration('client');
            });
        });

        // Event listeners for worker invoice generation
        generateWorkerInvoiceButtons.forEach(button => {
            button.addEventListener('click', function() {
                handleInvoiceGeneration('worker');
            });
        });

        setInvoiceNumberButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Find the corresponding input field
                const inputField = this.nextElementSibling;

                // Toggle the visibility of the input field
                inputField.classList.toggle('hidden');
            });
        });

        selectForClientInvoicingButtons.forEach(button => {
            button.addEventListener('click', function() {
                const clientId = this.getAttribute('data-client-id');
                const selectedShifts = [];
                const checkboxes = this.parentNode.previousElementSibling.querySelectorAll(
                    '.shift-checkbox:checked');

                checkboxes.forEach(checkbox => {
                    selectedShifts.push(checkbox.value);
                });

                // Convert the array to a JSON string and set it in the hidden input field
                selectedShiftsInput.value = JSON.stringify(selectedShifts);
                document.getElementById('client-id-input').value = clientId;
            });
        });

        selectForWorkerInvoicingButtons.forEach(button => {
            button.addEventListener('click', function() {
                const workerId = this.getAttribute('data-worker-id');
                const workerSelectedShifts = [];
                const checkboxes = this.parentNode.previousElementSibling.querySelectorAll(
                    '.worker-shift-checkbox:checked');

                checkboxes.forEach(checkbox => {
                    workerSelectedShifts.push(checkbox.value);
                });

                // Convert the array to a JSON string and set it in the hidden input field for worker shifts
                selectedWorkerShiftsInput.value = JSON.stringify(workerSelectedShifts);
                workerIdInput.value = workerId;
            });
        });

        generateInvoiceButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Set the selected_shifts data in the hidden input field
                const selectedShifts = [];
                const checkboxes = document.querySelectorAll('.shift-checkbox:checked');

                checkboxes.forEach(checkbox => {
                    selectedShifts.push(checkbox.value);
                });

                const type = this.getAttribute('data-type');

                // Define the appropriate URL based on the type (client or worker)
                let url;
                let inputFieldId;

                if (type === 'client') {
                    url = '/generate-client-invoice'; // Update with your client invoice route
                    inputFieldId = 'selected-shifts-input';
                } else if (type === 'worker') {
                    url = '/generate-worker-invoice'; // Update with your worker invoice route
                    inputFieldId = 'selected-worker-shifts-input';
                } else {
                    console.error('Invalid invoice type.');
                    return;
                }

                // Convert the array to a JSON string and set it in the hidden input field
                document.getElementById(inputFieldId).value = JSON.stringify(selectedShifts);

                // Submit the form
                // Send an AJAX request to generate the invoice
                fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Replace with an actual CSRF token value
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            // Pass other parameters if needed
                        }),
                    })
                    .then(response => response.blob()) // Convert response to blob
                    .then(blob => {
                        // Create a temporary URL for the blob
                        const url = window.URL.createObjectURL(blob);

                        // Open the PDF in a new tab
                        window.open(url, '_blank');

                        // Release the temporary URL
                        window.URL.revokeObjectURL(url);
                    })
                    .catch(error => {
                        console.error('Error generating invoice:', error);
                    });
            });
        });
    });
</script>
