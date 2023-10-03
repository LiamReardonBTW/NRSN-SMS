<x-app-layout>
    <!-- Page Header Title -->
    <x-slot name="header">
        {{ __('All Invoices') }}
    </x-slot>

    <!-- Invoices Table Container -->
    <h2 class="text-2xl font-semibold bg-blue-400 rounded-t-md py-4 mt-6 px-3">Invoices:</h2>
    <div class="bg-blue-200 p-3 rounded-b-md py-8">
        <div class="relative overflow-auto border-2 border-blue-600 rounded mx-5"
            style="max-height: 700px; overflow-y: auto;">
            <table class="w-full text-left text-gray-800 bg-gray-100">
                <!-- Table Headers -->
                <thead class="text-xs uppercase text-gray-50 bg-blue-800">
                    <tr>
                        <!-- Recipient Type Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            Type
                        </th>

                        <!-- Recipient Name Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            Recipient
                        </th>

                        <!-- Invoice Number Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            Invoice Number
                        </th>

                        <!-- Status Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            Status
                        </th>

                        <!-- Total Amount Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            Total Amount
                        </th>

                        <!-- Created At Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            Last Updated
                        </th>

                        <!-- Actions Header (Only View Invoice button) -->
                        <th scope="col" class="w-48 text-right px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            <span class="mr-28">Actions</span>
                        </th>
                    </tr>
                </thead>

                <!-- Table Content -->
                <tbody class="text-sm font-bold">
                    <!-- Loop through all client invoices and display their information -->
                    @foreach ($allInvoices as $invoice)
                        @if ($invoice->status == 'paid')
                            <tr class="bg-green-300 hover:bg-green-200 h-12 text-center">
                            @else
                            <tr class="even:bg-gray-100 odd:bg-gray-200 hover:bg-gray-300 h-12 text-center">
                        @endif
                        <!-- Invoice Information -->
                        <td scope="row" class="px-1 py-1">
                            <span class="text-lg">{{ ucfirst($invoice->type) }}</span>
                        </td>
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
                            {{ ucfirst($invoice->status) }}
                        </td>
                        <td scope="row" class="px-1 py-1">
                            {{ $invoice->totalamount }}
                        </td>
                        <td scope="row" class="px-1 py-1">
                            {{ $invoice->updated_at->format('Y-m-d') }}<br>
                            {{ $invoice->updated_at->format('H:i:s') }}
                        </td>
                        <td class="text-xs text-white font-bold float-right py-2">
                            <div class="grid grid-cols-2">
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
                                @elseif ($invoice->status === 'paid')
                                    <form method="POST"
                                        action="{{ route('archiveInvoice', ['id' => $invoice->id]) }}">
                                        @csrf
                                        <button type="submit"
                                            class="inline-block px-2 m-1 py-1 bg-gray-600 text-white rounded hover:bg-gray-500">Archive
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

    <!-- Invoices Table Container -->
    <h2 id="toggle-archived-invoices" class="text-2xl font-semibold bg-gray-400 rounded-t-md py-4 mt-6 px-3">Archived
        Invoices: <span class="float-right mx-6">&#9660;</span></h2>
    <div id="archived-invoices" class="hidden bg-gray-200 p-3 rounded-b-md py-8">
        <div class="relative overflow-auto border-2 border-gray-600 rounded mx-5"
            style="max-height: 700px; overflow-y: auto;">
            <table class="w-full text-left text-gray-800 bg-gray-100">
                <!-- Table Headers -->
                <thead class="text-xs uppercase text-gray-50 bg-gray-800">
                    <tr>
                        <!-- Recipient Type Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-gray-500 border-b-2">
                            Type
                        </th>

                        <!-- Recipient Name Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-gray-500 border-b-2">
                            Recipient
                        </th>

                        <!-- Invoice Number Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-gray-500 border-b-2">
                            Invoice Number
                        </th>

                        <!-- Status Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-gray-500 border-b-2">
                            Status
                        </th>

                        <!-- Total Amount Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-gray-500 border-b-2">
                            Total Amount
                        </th>

                        <!-- Created At Header -->
                        <th scope="col" class="px-2 py-1 border-r-2 border-gray-500 border-b-2">
                            Last Updated
                        </th>

                        <!-- Actions Header (Only View Invoice button) -->
                        <th scope="col" class="w-48 text-right px-2 py-1 border-r-2 border-gray-500 border-b-2">
                            <span class="mr-28">Actions</span>
                        </th>
                    </tr>
                </thead>

                <!-- Table Content -->
                <tbody class="text-sm font-bold">
                    <!-- Loop through all client invoices and display their information -->
                    @foreach ($archivedInvoices as $invoice)
                        @if ($invoice->status == 'paid')
                            <tr class="bg-green-300 hover:bg-green-200 h-12 text-center">
                            @else
                            <tr class="even:bg-gray-100 odd:bg-gray-200 hover:bg-gray-300 h-12 text-center">
                        @endif
                        <!-- Invoice Information -->
                        <td scope="row" class="px-1 py-1">
                            <span class="text-lg">{{ ucfirst($invoice->type) }}</span>
                        </td>
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
                            {{ ucfirst($invoice->status) }}
                        </td>
                        <td scope="row" class="px-1 py-1">
                            {{ $invoice->totalamount }}
                        </td>
                        <td scope="row" class="px-1 py-1">
                            {{ $invoice->updated_at->format('Y-m-d') }}<br>
                            {{ $invoice->updated_at->format('H:i:s') }}
                        </td>
                        <td class="text-xs text-white font-bold float-right py-2">
                            <div class="grid grid-cols-2">
                                <!-- View Invoice Button -->
                                <a href="{{ $invoice->pdf_path }}" target="_blank"
                                    class="inline-block px-2 m-1 py-1 bg-green-600 text-white rounded hover:bg-green-500">
                                    View Invoice
                                </a>
                                @if ($invoice->status === 'pending')
                                    <form method="POST" action="{{ route('allinvoices.destroy', $invoice) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-block px-2 m-1 py-1 bg-red-600 text-white rounded hover:bg-red-500">Undo
                                            Invoice
                                        </button>
                                    </form>
                                @elseif ($invoice->status === 'archived')
                                    <form method="POST"
                                        action="{{ route('unarchiveInvoice', ['id' => $invoice->id]) }}">
                                        @csrf
                                        <button type="submit"
                                            class="inline-block px-2 m-1 py-1 bg-gray-600 text-white rounded hover:bg-gray-500">Unarchive
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
    <div class="block my-12">
        <!-- Back to Dashboard -->
        <a href="{{ route('dashboard') }}"
            class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
            Back
        </a>
    </div>

</x-app-layout>
<script>
    // Wait for the DOM to be loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Select the "Archived Invoices" div and the toggle heading by their IDs
        const archivedInvoicesDiv = document.getElementById('archived-invoices');
        const toggleHeading = document.getElementById('toggle-archived-invoices');

        // Add a click event listener to the toggle heading
        toggleHeading.addEventListener('click', function() {
            // Toggle the visibility of the "Archived Invoices" div
            if (archivedInvoicesDiv.style.display === 'none' || archivedInvoicesDiv.style.display ===
                '') {
                archivedInvoicesDiv.style.display = 'block';
            } else {
                archivedInvoicesDiv.style.display = 'none';
            }
        });
    });
</script>
