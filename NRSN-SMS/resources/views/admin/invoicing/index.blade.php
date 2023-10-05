<x-app-layout>
    <!-- Page Header Title -->
    <x-slot name="header">
        {{ __('Invoicing') }}
    </x-slot>

    <!-- Client Invoices Table Container -->
    <h2 class="text-2xl font-semibold bg-green-400 rounded-t-md py-4 px-3">Clients:</h2>
    <div class="bg-green-200 p-3 pb-12 rounded-b-md">
        <h2 class="text-xl font-semibold mb-2 py-4">Ready to invoice:</h2>
        <!-- Display error message here -->
        @error('invoice_number')
            <div class="text-red-500 text-xs my-2">{{ $message }}</div>
        @enderror


        <div class="relative overflow-auto border-2 border-blue-600 rounded mx-5"
            style="max-height: 300px; overflow-y: auto;">
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
                        <th scope="col" class="w-48 text-right px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                            <span class="mr-28">Actions</span>
                        </th>

                    </tr>
                </thead>

                <!-- Table Content -->
                <tbody class="text-xs font-bold">
                    <!-- Loop through clients/workers and display their information -->
                    @foreach ($clients as $client)
                        <tr class="even:bg-gray-100 odd:bg-gray-200 hover:bg-gray-300 h-12 text-center">
                            <!-- Client/Worker Information -->
                            <td scope="row" class="px-1 py-1">
                                {{ $client->first_name }} {{ $client->last_name }}
                            </td>
                            <td scope="row" class="px-1 py-1">
                                <!-- Calculate and display the total uninvoiced and approved shifts -->
                                {{ $client->shifts->where('approved', 1)->where('clientinvoice_id', null)->count() }}
                            </td>
                            <td class="whitespace-nowrap text-sm text-white font-bold float-right py-3">
                                <!-- Generate Invoice Button with Form -->
                                <form action="{{ route('generate.client-invoice') }}" method="POST" target="_blank">
                                    @csrf
                                    <input type="hidden" name="client_id" value="{{ $client->id }}">
                                    <div class="text-black flex items-center grid-rows-2 grid">
                                        <button type="submit"
                                            class="text-white generate-client-invoice-button inline-block px-2 mx-1 py-1 bg-green-600 rounded hover:shadow-xl hover:bg-green-500">
                                            Generate Client Invoice
                                        </button>
                                        <button type="button"
                                            class="text-white set-invoice-number-button inline-block px-2 mx-1 py-1 mt-1 bg-blue-600 rounded-t-md hover:shadow-xl hover:bg-blue-500">
                                            Set Invoice Number <span class="text-xs">&#9660;</span>
                                        </button>
                                        <input type="text" name="invoice_number"
                                            class="invoice-number-field hidden text-sm py-1 text-center px-2 mx-1 rounded-b-md"
                                            placeholder="Invoice #: {{ $nextInvoiceNumbers['clients'][$client->id] }}">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Add this section for Client Invoices -->
        <h2 class="text-xl font-semibold my-6">Pending Payment:</h2>
        <div class="relative overflow-auto border-2 border-blue-600 rounded mx-5"
            style="max-height: 300px; overflow-y: auto;">
            <table class="w-full text-left text-gray-800 bg-gray-100">
                <!-- Table Headers -->
                <thead class="text-xs uppercase text-gray-50 bg-blue-800">
                    <tr>
                        <!-- Invoice Number Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            Invoice Number
                        </th>

                        <!-- Client Name Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            Client Name
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
                                {{ $invoice->invoice_number }}
                            </td>
                            <td scope="row" class="px-1 py-1">
                                <!-- Retrieve and display the recipient's first_name and last_name -->
                                @if ($invoice->recipient)
                                    {{ $invoice->recipient->first_name }} {{ $invoice->recipient->last_name }}
                                @else
                                    N/A <!-- Handle the case when recipient is not found -->
                                @endif
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
            style="max-height: 300px; overflow-y: auto;"> <!-- User Invoices Table -->
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
                        <th scope="col" class="w-48 text-right px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                            <span class="mr-28">Actions</span>
                        </th>
                    </tr>
                </thead>

                <!-- Table Content -->
                <tbody class="text-xs font-bold">
                    <!-- Loop through clients/workers and display their information -->
                    @foreach ($workers as $worker)
                        <tr class="even:bg-gray-100 odd:bg-gray-200 hover:bg-gray-300 h-12 text-center">
                            <!-- Client/Worker Information -->
                            <td scope="row" class="px-1 py-1">
                                {{ $worker->first_name }} {{ $worker->last_name }}
                            </td>
                            <td scope="row" class="px-1 py-1">
                                <!-- Calculate and display the total uninvoiced and approved shifts -->
                                {{ $worker->shifts->where('approved', 1)->where('workerinvoice_id', null)->count() }}
                            </td>
                            <td class="whitespace-nowrap text-sm text-white font-bold float-right py-3">
                                <!-- Generate Invoice Button with Form -->
                                <form action="{{ route('generate.worker-invoice') }}" target="_blank" method="POST">
                                    @csrf
                                    <input type="hidden" name="worker_id" value="{{ $worker->id }}">
                                    <div class="text-black flex items-center grid-rows-2 grid">
                                        <button type="submit"
                                            class="text-white generate-worker-invoice-button inline-block px-2 mx-1 py-1 bg-green-600 rounded hover:shadow-xl hover:bg-green-500">
                                            Generate Worker Invoice
                                        </button>
                                        <button type="button"
                                            class="text-white set-invoice-number-button inline-block px-2 mx-1 py-1 mt-1 bg-blue-600 rounded-t-md hover:shadow-xl hover:bg-blue-500">
                                            Set Invoice Number <span class="text-xs">&#9660;</span>
                                        </button>
                                        <input type="text" name="invoice_number"
                                            class="invoice-number-field hidden text-sm py-1 text-center px-2 mx-1 rounded-b-md"
                                            placeholder="Invoice #: {{ $nextInvoiceNumbers['workers'][$worker->id] }}">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Add this section for Worker Invoices -->
        <h2 class="text-xl font-semibold my-6">Pending Payment:</h2>
        <div class="relative overflow-auto border-2 border-blue-600 rounded mx-5"
            style="max-height: 300px; overflow-y: auto;">
            <table class="w-full text-left text-gray-800 bg-gray-100">
                <!-- Table Headers -->
                <thead class="text-xs uppercase text-gray-50 bg-blue-800">
                    <tr>
                        <!-- Invoice Number Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            Invoice Number
                        </th>

                        <!-- Worker Name Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            Worker Name
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
                                {{ $invoice->invoice_number }}
                            </td>
                            <td scope="row" class="px-1 py-1">
                                <!-- Retrieve and display the recipient's first_name and last_name -->
                                @if ($invoice->recipient)
                                    {{ $invoice->recipient->first_name }} {{ $invoice->recipient->last_name }}
                                @else
                                    N/A <!-- Handle the case when recipient is not found -->
                                @endif
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

        setInvoiceNumberButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Find the corresponding input field
                const inputField = this.nextElementSibling;

                // Toggle the visibility of the input field
                inputField.classList.toggle('hidden');
            });
        });

        generateClientInvoiceButtons.forEach(button => {
            button.addEventListener('click', function() {
                const clientId = this.getAttribute('data-client-id');

                // Send an AJAX request to generate the client invoice
                fetch('{{ route('generate.client-invoice') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            client_id: clientId
                        }),
                    })
                    .then(blob => {
                        // Create a temporary URL for the generated PDF
                        const url = window.URL.createObjectURL(blob);

                        // Open the PDF in a new tab
                        window.open(url, '_blank');

                        // Release the temporary URL
                        window.URL.revokeObjectURL(url);
                    })
                    .catch(error => {
                        console.error('Error generating client invoice:', error);
                    });
            });
        });

        generateWorkerInvoiceButtons.forEach(button => {
            button.addEventListener('click', function() {
                const workerId = this.getAttribute('data-worker-id');

                // Send an AJAX request to generate the worker invoice
                fetch('{{ route('generate.worker-invoice') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            worker_id: workerId
                        }),
                    })
                    .then(blob => {
                        // Create a temporary URL for the generated PDF
                        const url = window.URL.createObjectURL(blob);

                        // Open the PDF in a new tab
                        window.open(url, '_blank');

                        // Release the temporary URL
                        window.URL.revokeObjectURL(url);
                    })
                    .catch(error => {
                        console.error('Error generating worker invoice:', error);
                    });
            });
        });
    });
</script>
