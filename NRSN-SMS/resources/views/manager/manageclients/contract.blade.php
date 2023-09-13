<x-app-layout>
    <!-- Page Header Title -->
    <x-slot name="header">
        <!-- Shows selected clients first and last name -->
        {{ __('Client Contract:') }} {{ $client->first_name }} {{ $client->last_name }}
    </x-slot>

    <!-- Contract Information Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg p-6 lg:px-8">
        <h2 class="text-2xl font-medium mb-4">{{ $client->first_name }}'s Current Contract</h2>

        @if ($client->clientContracts->isEmpty())
            <p class="text-lg">No contracts available for this client.</p>
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
    </div>

    <!-- Rest of your code -->
</x-app-layout>
