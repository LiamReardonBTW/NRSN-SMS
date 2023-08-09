<x-app-layout>

    <!-- Page Header Title -->
    <x-slot name="header">
        {{ __('All Clients') }}
    </x-slot>

    <!-- Table Container -->
    <div class="relative overflow-auto border-2 border-blue-600 rounded">

        <!-- All Clients Table -->
        <table class="w-full text-left text-gray-800 bg-gray-100">

            <!-- Table Headers -->
            <thead class="text-xs uppercase text-gray-50 bg-blue-800">
                <tr>
                    <!-- Client ID Table Header -->
                    <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2">
                        <div class="flex items-center">
                            Client ID
                            <!-- Sort By 'client_id' Button -->
                            <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>

                    <!-- First Name Table Header -->
                    <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                        <div class="flex items-center">
                            First Name
                            <!-- Sort By 'first_name' Button -->
                            <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>

                    <!-- Last Name Table Header -->
                    <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                        <div class="flex items-center">
                            Last Name
                            <!-- Sort By 'last_name' Button -->
                            <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>

                    <!-- Active Status Table Header -->
                    <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                        <div class="flex items-center">
                            Active
                            <!-- Sort By 'active' Button -->
                            <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>

                    <!-- Phone Number Table Header -->
                    <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                        <div class="flex items-center">
                            Phone
                        </div>
                    </th>

                    <!-- Email Table Header -->
                    <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                        <div class="flex items-center">
                            Email
                        </div>
                    </th>

                    <!-- Address Table Header -->
                    <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                        <div class="flex items-center">
                            Address
                        </div>
                    </th>

                    <!-- Invoicing Codes Table Header -->
                    <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                        <div class="flex items-center">
                            Invoicing Codes
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

                <!-- For each client in the clients table, add a new row including their information -->
                @foreach ($clients as $client)
                    <tr class="even:bg-gray-50 odd:bg-gray-200 hover:bg-blue-200 h-12">
                        <!-- Client Information -->
                        <td scope="row" class="px-1 py-1 text-center">
                            {{ $client->id }}
                        </td>
                        <td scope="row" class="px-1 py-1">
                            {{ $client->first_name }}
                        </td>
                        <td scope="row" class="px-1 py-1">
                            {{ $client->last_name }}
                        </td>
                        <td scope="row" class="px-1 py-1 text-center">
                            {{ $client->active ? 'Active' : 'Inactive' }}
                        </td>
                        <td scope="row" class="px-1 py-1">
                            {{ $client->phone }}
                        </td>
                        <td scope="row" class="px-1 py-1">
                            {{ $client->email }}
                        </td>
                        <td scope="row" class="px-1 py-1">
                            {{ $client->address }}
                        </td>
                        <td scope="row" class="px-1 py-1">
                            {{ $client->invoicing_codes }}
                        </td>
                        <!-- View/edit/delete buttons for associated client  -->
                        <td class="whitespace-nowrap text-sm text-white font-bold float-right py-3">
                            <!-- View Button -->
                            <a href="{{ route('allclients.show', $client->id) }}"
                                class="inline-block px-2 mx-1 py-1 bg-green-600 rounded hover:shadow-xl hover:bg-green-500">View</a>
                            <!-- Edit Button -->
                            <a href="{{ route('allclients.edit', $client->id) }}"
                                class="inline-block px-2 mx-1 py-1 bg-blue-600 rounded hover:shadow-xl hover:bg-blue-500">Edit</a>
                            <!-- Delete Button with Confirmation -->
                            <form class="inline-block" action="{{ route('allclients.destroy', $client->id) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you would like to delete this client? This action cannot be undone');">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit"
                                    class="px-2 mx-1 py-1 bg-red-600 rounded hover:shadow-xl hover:bg-red-500"
                                    value="Delete">
                            </form>
                        </td>

                    </tr> <!-- Table Row End  -->
                @endforeach <!-- End foreach when no remaining clients -->
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
        <!-- To Add Client Page -->
        <a href="{{ route('allclients.create') }}"
            class="inline-flex items-center mx-4 px-6 py-4 bg-green-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-green-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
            Add Client </a>
        </a>
    </div>

</x-app-layout>
