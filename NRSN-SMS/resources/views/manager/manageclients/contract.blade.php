<x-app-layout>
    <!-- Page Header Title -->
    <x-slot name="header">
        <!-- Shows selected clients first and last name -->
        {{ __('Client Contract:') }} {{ $client->first_name }} {{ $client->last_name }}
    </x-slot>

    <!-- Contract Information Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg p-6 lg:px-8">
        <h2 class="text-2xl font-medium mb-4">{{ $client->first_name }}'s Current Contract</h2>

        @if ($client->clientContracts->where('active', true)->isEmpty())
            <p class="text-lg bg-white rounded-md p-2">No active contracts available for this client.</p>
        @else
            <ul class="space-y-4">
                @foreach ($client->clientContracts as $contract)
                    @if ($contract->active)
                        <li class="bg-white rounded-lg p-4 shadow-md">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <span class="font-semibold">Contract Start Date:</span>
                                    <div>
                                        {{ \Carbon\Carbon::parse($contract->startdate)->format('Y-m-d') }}
                                    </div>
                                </div>
                                <div>
                                    <span class="font-semibold">Contract End Date:</span>
                                    <div>
                                        {{ \Carbon\Carbon::parse($contract->enddate)->format('Y-m-d') }}
                                    </div>
                                </div>
                                <div>
                                    <span class="font-semibold">Balance:</span>
                                    <div>
                                        ${{ $contract->balance }}
                                    </div>
                                </div>
                                <div>
                                    <span class="font-semibold">Weekday Hourly Rate:</span>
                                    <div>
                                        ${{ $contract->weekdayhourlyrate }}
                                    </div>
                                </div>
                                <div>
                                    <span class="font-semibold">Saturday Hourly Rate:</span>
                                    <div>
                                        ${{ $contract->saturdayhourlyrate }}
                                    </div>
                                </div>
                                <div>
                                    <span class="font-semibold">Public Holiday Hourly Rate:</span>
                                    <div>
                                        ${{ $contract->publicholidayhourlyrate }}
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        @endif
        <h2 class="text-2xl font-medium my-4">{{ $client->first_name }}'s Previous Contracts</h2>

        <!-- Check if there are any previous inactive contracts for the client -->
        @if ($client->clientContracts->where('active', 0)->where('client_id', $client->id)->isEmpty())
            <p class="text-lg bg-white rounded-md p-2">No previous contracts available for this client.</p>
        @else
            <!-- Table Container -->
            <div class="relative overflow-auto border-2 border-blue-600 rounded">
                <!-- manage clients Table -->
                <table class="w-full text-left text-gray-800 bg-gray-100">
                    <!-- Table Headers -->
                    <thead class="text-xs uppercase text-gray-50 bg-blue-800">
                        <tr>
                            <!-- Start Date Table Header -->
                            <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2">
                                <div class="flex items-center">
                                    Start Date
                                    <!-- Sort By 'startdate' Button -->
                                    <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                        </svg></a>
                                </div>
                            </th>

                            <!-- End Date Table Header -->
                            <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                                <div class="flex items-center">
                                    End Date
                                    <!-- Sort By 'enddate' Button -->
                                    <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                        </svg></a>
                                </div>
                            </th>

                            <!-- Balance Table Header -->
                            <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                                <div class="flex items-center">
                                    Balance
                                    <!-- Sort By 'balance' Button -->
                                    <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                        </svg></a>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <!-- Table Content -->
                    <tbody class="text-xs font-bold">
                        <!-- For each inactive client contract related to the client, add a new row including start date, end date, and balance -->
                        @foreach ($client->clientContracts->where('active', 0)->where('client_id', $client->id) as $contract)
                            <tr class="even:bg-gray-50 odd:bg-gray-200 hover:bg-blue-200 h-12">
                                <!-- Start Date -->
                                <td scope="row" class="px-1 py-1">
                                    {{ \Carbon\Carbon::parse($contract->startdate)->format('Y-m-d') }}
                                </td>
                                <!-- End Date -->
                                <td scope="row" class="px-1 py-1">
                                    {{ \Carbon\Carbon::parse($contract->enddate)->format('Y-m-d') }}
                                </td>
                                <!-- Balance -->
                                <td scope="row" class="px-1 py-1">
                                    ${{ $contract->balance }}
                                </td>
                            </tr> <!-- Table Row End  -->
                        @endforeach <!-- End foreach when no remaining client contracts -->
                    </tbody> <!-- Close table content -->
                </table>
            </div>
        @endif
    </div>
    <!-- Rest of your code -->
</x-app-layout>
