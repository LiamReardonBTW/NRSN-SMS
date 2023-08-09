<x-app-layout>

    <!-- Page Header Title -->
    <x-slot name="header">
        {{ __('Manage Shifts') }}
    </x-slot>

    <!-- Table Container -->
    <div class="relative overflow-auto border-2 border-blue-600 rounded">

        <!-- Manage Shifts Table -->
        <table class="w-full text-left text-gray-800 bg-gray-100">

            <!-- Table Headers -->
            <thead class="text-xs uppercase text-gray-50 bg-blue-800">
                <tr>
                    <!-- Invoice Table Header -->
                    <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                        <div class="flex items-center">
                            Invoice
                        </div>
                    </th>

                    <!-- Submitted By Table Header -->
                    <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                        <div class="flex items-center">
                            Submitted By
                            <!-- Sort By 'submitted_by' Button -->
                            <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>

                    <!-- Client Supported Table Header -->
                    <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                        <div class="flex items-center">
                            Client Supported
                            <!-- Sort By 'client_supported' Button -->
                            <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>

                    <!-- Submission Date Table Header -->
                    <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                        <div class="flex items-center">
                            Submission Date
                            <!-- Sort By 'submission_date' Button -->
                            <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>

                    <!-- Expenses Table Header -->
                    <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                        <div class="flex items-center">
                            Expenses
                        </div>
                    </th>

                    <!-- km Travelled Table Header -->
                    <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                        <div class="flex items-center">
                            km Travelled
                        </div>
                    </th>

                    <!-- Hours Worked Table Header -->
                    <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                        <div class="flex items-center">
                            Hours Worked
                        </div>
                    </th>

                    <!-- Flagged Table Header -->
                    <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                        <div class="flex items-center">
                            Flagged
                            <!-- Sort By 'isflagged' Button -->
                            <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>

                    <!-- Invoiced Table Header -->
                    <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                        <div class="flex items-center">
                            Invoiced
                            <!-- Sort By 'isinvoiced' Button -->
                            <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
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

                <!-- For each shift in the shifts table, add a new row including their information -->
                @foreach ($shifts as $shift)
                    <tr class="even:bg-gray-50 odd:bg-gray-200 hover:bg-blue-200 h-12">
                        <!-- Shift Information -->
                        <td scope="row" class="px-1 py-1 text-center">
                            {{ $shift->invoice }}
                        </td>
                        <td scope="row" class="px-1 py-1 text-center">
                            {{ $shift->submitted_by }}
                        </td>
                        <td scope="row" class="px-1 py-1 text-center">
                            {{ $shift->client_supported }}
                        </td>
                        <td scope="row" class="px-1 py-1 text-center">
                            {{ $shift->date }}
                        </td>
                        <td scope="row" class="px-1 py-1 text-center">
                            {{ $shift->expenses }}
                        </td>
                        <td scope="row" class="px-1 py-1 text-center">
                            {{ $shift->km }}
                        </td>
                        <td scope="row" class="px-1 py-1 text-center">
                            {{ $shift->hours }}
                        </td>
                        <td scope="row" class="px-1 py-1 text-center">
                            @if ($shift->isflagged == '0')
                                No
                            @endif
                            @if ($shift->isflagged == '1')
                                Yes
                            @endif
                        </td>
                        <td scope="row" class="px-1 py-1 text-center">
                            @if ($shift->isinvoiced == '0')
                                No
                            @endif
                            @if ($shift->isinvoiced == '1')
                                Yes
                            @endif
                        </td>
                        <!-- View/edit/delete buttons for associated client  -->
                        <td class="whitespace-nowrap text-sm text-white font-bold float-right py-3">
                            <!-- View Button -->
                            <a href="{{ route('manageshifts.show', $shift->id) }}"
                                class="inline-block px-2 mx-1 py-1 bg-green-600 rounded hover:shadow-xl hover:bg-green-500">View</a>
                            <!-- Edit Button -->
                            <a href="{{ route('manageshifts.edit', $shift->id) }}"
                                class="inline-block px-2 mx-1 py-1 bg-blue-600 rounded hover:shadow-xl hover:bg-blue-500">Edit</a>
                            <!-- Delete Button -->
                            <form class="inline-block" action="{{ route('manageshifts.destroy', $shift->id) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you would like to delete this shift? This action cannot be undone');">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit"
                                    class="px-2 mx-1 py-1 bg-red-600 rounded hover:shadow-xl hover:bg-red-500"
                                    value="Delete">
                            </form>
                        </td>

                    </tr> <!-- Table Row End  -->
                @endforeach <!-- End foreach when no remaining shifts -->
            </tbody> <!-- Close table content -->

        </table> <!-- Close table -->
    </div> <!-- Close table container -->

    <!-- Page Navigation Buttons -->
    <div class="block pb-12 pt-12">
        <!-- Back to Dashboard -->
        <a href="{{ route('dashboard') }}"
            class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
            Back
        </a>
        <!-- To Add Shift Page -->
        <a href="{{ route('manageshifts.create') }}"
            class="inline-flex items-center mx-4 px-6 py-4 bg-green-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-green-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
            Add Shift </a>
        </a>
    </div>

</x-app-layout>
