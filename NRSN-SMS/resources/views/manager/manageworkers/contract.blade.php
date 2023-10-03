<x-app-layout>

    <!-- Page Header Title -->
    <x-slot name="header">
        <!-- Shows selected clients first and last name -->
        {{ __('Worker Contract:') }} {{ $user->first_name }} {{ $user->last_name }}
    </x-slot>

    <!-- Form Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">

        @if ($user->userContracts->where('active', true)->isEmpty())
            <p class="text-lg bg-white rounded-md p-2 m-4">No active contract for this user.</p>
        @else
            @foreach ($user->userContracts as $contract)
                @if ($contract->active)
                    <!-- Contract Information Container -->
                    <div
                        class="text-2xl font-medium bg-blue-300 overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">
                        <!-- User ID -->
                        <div class="mx-4 mt-5 grid grid-rows-3">
                            <label for="user_id">User ID</label>
                            <x-input disabled type="int" name="user_id" id="user_id"
                                class="form-input rounded-md shadow-sm block w-full" value="{{ $user->id }}" />
                        </div>
                        <!-- Start Date -->
                        <div class="mx-4 mt-5 grid grid-rows-3">
                            <label for="startdate">Contract Start Date</label>
                            <x-input disabled type="date" name="startdate" id="startdate"
                                class="form-input rounded-md shadow-sm block w-full"
                                value="{{ \Carbon\Carbon::parse($contract->startdate)->format('Y-m-d') }}" />
                        </div>
                        <!-- Contract End Date -->
                        <div class="mx-4 mt-5 grid grid-rows-3">
                            <label for="enddate">Contract End Date</label>
                            <x-input disabled type="date" name="enddate" id="enddate"
                                class="form-input rounded-md shadow-sm block w-full"
                                value="{{ \Carbon\Carbon::parse($contract->enddate)->format('Y-m-d') }}" />
                        </div>
                    </div>
                    <div
                        class="text-2xl font-medium bg-blue-200 overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">
                        <!-- Weekday Hourly Rate -->
                        <div class="mx-4 mt-5 grid grid-rows-3">
                            <label for="weekdayhourlyrate">Weekday Hourly Rate</label>
                            <x-input disabled type="numeric" name="weekdayhourlyrate" id="weekdayhourlyrate"
                                class="form-input rounded-md shadow-sm block w-full"
                                value="${{ $contract->weekdayhourlyrate }}" />
                        </div>
                        <!-- Saturday Hourly Rate -->
                        <div class="mx-4 mt-5 grid grid-rows-3">
                            <label for="saturdayhourlyrate">Saturday Hourly Rate</label>
                            <x-input disabled type="numeric" name="saturdayhourlyrate" id="saturdayhourlyrate"
                                class="form-input rounded-md shadow-sm block w-full"
                                value="${{ $contract->saturdayhourlyrate }}" />
                        </div>
                        <!-- Sunday Hourly Rate -->
                        <div class="mx-4 mt-5 grid grid-rows-3">
                            <label for="sundayhourlyrate">Sunday Hourly Rate</label>
                            <x-input disabled type="numeric" name="sundayhourlyrate" id="sundayhourlyrate"
                                class="form-input rounded-md shadow-sm block w-full"
                                value="${{ $contract->sundayhourlyrate }}" />
                        </div>
                        <!-- Public Holiday Hourly Rate -->
                        <div class="mx-4 mt-5 grid grid-rows-3">
                            <label for="publicholidayhourlyrate">Public Holiday Hourly Rate</label>
                            <x-input disabled type="numeric" name="publicholidayhourlyrate" id="publicholidayhourlyrate"
                                class="form-input rounded-md shadow-sm block w-full"
                                value="${{ $contract->publicholidayhourlyrate }}" />
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>

    <div class="my-6 relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg px-6 lg:px-8">
        <h2 class="text-2xl font-medium pt-4 mx-4">{{ $user->first_name }}'s Previous Contracts</h2>
        <!-- Check if there are any previous inactive contracts for the client -->
        @if ($user->userContracts->where('active', 0)->where('user_id', $user->id)->isEmpty())
            <p class="text-lg bg-white rounded-md p-2 m-4">No previous contracts available for this user.</p>
        @else
            <!-- Table Container -->
            <div class="relative overflow-auto border-2 border-blue-600 rounded m-4">
                <!-- manage workers Table -->
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
                        </tr>
                    </thead>
                    <!-- Table Content -->
                    <tbody class="text-xs font-bold">
                        <!-- For each inactive user contract related to the client, add a new row including start date, end date, and balance -->
                        @foreach ($user->userContracts->where('active', 0)->where('user_id', $user->id) as $contract)
                            <tr class="even:bg-gray-50 odd:bg-gray-200 hover:bg-blue-200 h-12">
                                <!-- Start Date -->
                                <td scope="row" class="px-1 py-1">
                                    {{ \Carbon\Carbon::parse($contract->startdate)->format('Y-m-d') }}
                                </td>
                                <!-- End Date -->
                                <td scope="row" class="px-1 py-1">
                                    {{ \Carbon\Carbon::parse($contract->enddate)->format('Y-m-d') }}
                                </td>
                            </tr> <!-- Table Row End  -->
                        @endforeach <!-- End foreach when no remaining client contracts -->
                    </tbody> <!-- Close table content -->
                </table>
            </div>
        @endif
    </div>
    <!-- Page Navigation Buttons -->
    <div
    class="flex items-center justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
    <!-- Back to manage clients index page -->
    <a href="{{ route('manageworkers.show', ['manageworker' => $user->id]) }}"
        class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
        Back
    </a>
</div>
</x-app-layout>
