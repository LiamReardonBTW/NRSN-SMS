<x-app-layout>
    <!-- Page Header Title -->
    <x-slot name="header">
        {{ __('Invoices') }}
    </x-slot>

    <!-- Table Container -->
    <h2 class="text-xl font-semibold mb-2">Clients:</h2>
    <div class="relative overflow-auto border-2 border-blue-600 rounded">
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
                            <!-- Calculate and display the total uninvoiced shifts -->
                            {{ $client->shifts->count() }}
                        </td>
                        <td class="whitespace-nowrap text-sm text-white font-bold float-right py-3">
                            <!-- Generate Invoice Button -->
                            <button class="generate-client-invoice-button inline-block px-2 mx-1 py-1 bg-blue-600 rounded hover:shadow-xl hover:bg-blue-500"
                                    data-client-id="{{ $client->id }}"
                                    class="inline-block px-2 mx-1 py-1 bg-green-600 rounded hover:shadow-xl hover:bg-green-500">
                                Generate Client Invoice
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Table Container -->
    <h2 class="text-xl font-semibold mb-2 mt-6">Workers:</h2>
    <div class="relative overflow-auto border-2 border-blue-600 rounded">
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
                @foreach ($workers as $worker)
                    <tr class="even:bg-gray-100 odd:bg-gray-200 hover:bg-gray-300 h-12 text-center">
                        <!-- Client/Worker Information -->
                        <td scope="row" class="px-1 py-1">
                            {{ $worker->first_name }} {{ $worker->last_name }}
                        </td>
                        <td scope="row" class="px-1 py-1">
                            <!-- Calculate and display the total uninvoiced shifts -->
                            {{ $worker->shifts->count() }}
                        </td>
                        <td class="whitespace-nowrap text-sm text-white font-bold float-right py-3">
                            <!-- Generate Invoice Button -->
                            <button class="generate-client-invoice-button inline-block px-2 mx-1 py-1 bg-blue-600 rounded hover:shadow-xl hover:bg-blue-500"
                                    data-client-id="{{ $client->id }}"
                                    class="inline-block px-2 mx-1 py-1 bg-green-600 rounded hover:shadow-xl hover:bg-green-500">
                                Generate Worker Invoice
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Page Navigation Buttons -->
    <div class="block pb-12 pt-12">
        <!-- Back to Dashboard -->
        <a href="{{ route('dashboard') }}"
            class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
            Back
        </a>
    </div>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const generateInvoiceButtons = document.querySelectorAll('.generate-client-invoice-button');

        generateInvoiceButtons.forEach(button => {
            button.addEventListener('click', function () {
                const clientId = this.getAttribute('data-client-id');

                // Send an AJAX request to generate the invoice
                fetch('{{ route('generate.client-invoice') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ client_id: clientId }),
                })
                .then(response => response.blob())
                .then(blob => {
                    // Create a temporary URL for the generated PDF
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
