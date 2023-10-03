<x-app-layout>

    <!-- Page Header Title -->
    <x-slot name="header">
        <!-- Shows selected clients first and last name -->
        {{ __('Client:') }} {{ $manageclient->first_name }} {{ $manageclient->last_name }}
    </x-slot>

    <!-- Form Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">

        <!-- Uneditable Information Container -->
        <div class="text-2xl font-medium bg-blue-300 overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

            <!-- Client ID -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                <label for="client_id">Client ID</label>
                <x-input disabled type="text" name="client_id" id="client_id"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $manageclient->id }}" />
            </div>

            <!-- Created at -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                <label for="created_at">Added</label>
                <x-input disabled type="text" name="created_at" id="created_at"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $manageclient->created_at }}" />
            </div>

            <!-- Last updated at -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                <label for="updated_at">Last Updated</label>
                <x-input disabled type="text" name="updated_at" id="updated_at"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $manageclient->updated_at }}" />
            </div>

                <div class="mx-4 mt-5 grid grid-rows-3">
                <h2>Client Contract</h2>
                <ul
                    class="py-2 font-normal text-base bg-white rounded-md shadow-sm block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    @if ($manageclient->clientContracts->isEmpty() || !$manageclient->clientContracts->contains('active', true))
                        <li class="mx-2">No active contract</li>
                    @else
                        @foreach ($manageclient->clientContracts as $contract)
                            @if ($contract->active)
                                @if ($contract->enddate)
                                    <!-- Check if enddate is not null -->
                                    <div class="grid grid-cols-2">
                                        <li class="mx-2">Active until:<br>
                                            {{ \Carbon\Carbon::parse($contract->enddate)->format('Y-m-d') }}</li>
                                        <a href="{{ route('client.contracts', ['clientId' => $manageclient->id]) }}">
                                            <div class="rounded p-2 my-auto mx-2 text-center bg-green-300">
                                                <div style="cursor: pointer;">
                                                    View Contract
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @else
                                    <li class="mx-2">No End Date</li>
                                @endif
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>

        </div><!-- End Uneditable Information Container -->

        <!-- Client Information Container -->
        <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

            <!-- First Name -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                <label for="first_name">First
                    Name</label>
                <x-input disabled type="text" name="first_name" id="first_name"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $manageclient->first_name }}" />
            </div>

            <!-- Last Name -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                <label for="last_name">Last Name</label>
                <x-input disabled type="text" name="last_name" id="last_name"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $manageclient->last_name }}" />
            </div>

            <!-- Phone # -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                <label for="phone">Phone #</label>
                <x-input disabled type="string" name="phone" id="phone"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $manageclient->phone }}" />
            </div>

            <!-- Email -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                <label for="email">Email</label>
                <x-input disabled type="email" name="email" id="email"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $manageclient->email }}" />
            </div>

            <!-- Address -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                <label for="address">Address</label>
                <x-input disabled type="text" name="address" id="address"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $manageclient->address }}" />
            </div>

            <!-- Active Status -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                <label for="active">Active Status</label>
                <select disabled name="active" id="active" class="opacity-100 rounded-md shadow-sm block w-full">
                    <option value="1" {{ $manageclient->active === '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $manageclient->active === 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

        </div> <!-- End Client Information Container -->

        <!-- Clients Supported by the User -->
        <div class="text-2xl font-medium overflow-hidden px-6 lg:px-8 mx-4 my-5">
            <h2 class="text-xl font-semibold mb-2">Supported By</h2>
            <div class="rounded-md bg-white shadow-md p-4 max-h-40 overflow-y-auto text-sm">
                <!-- Add text-sm class for smaller text -->
                <ul>
                    @if ($manageclient->supportedByUser->isEmpty())
                        <li>Currently not supported.</li>
                    @else
                        @foreach ($manageclient->supportedByUser->sortBy('last_name') as $user)
                            <li>{{ $user->first_name }} {{ $user->last_name }}</li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>

        <!-- Clients Supported by the User -->
        <div class="text-2xl font-medium overflow-hidden px-6 lg:px-8 mx-4 my-5">
            <h2 class="text-xl font-semibold mb-2">Managed By</h2>
            <div class="rounded-md bg-white shadow-md p-4 max-h-40 overflow-y-auto text-sm">
                <!-- Add text-sm class for smaller text -->
                <ul>
                    @if ($manageclient->managedByUser->isEmpty())
                        <li>Currently not managed.</li>
                    @else
                        @foreach ($manageclient->managedByUser->sortBy('last_name') as $user)
                            <li>{{ $user->first_name }} {{ $user->last_name }}</li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>

        <!-- Activities Container -->
        <div class="text-2xl font-medium overflow-hidden px-6 lg:px-8 mx-4 my-5">
            <h2 class="text-xl font-semibold mb-2">Activities</h2>
            <div class="rounded-md bg-white shadow-md p-4 max-h-40 overflow-y-auto text-xs">
                @if (is_null($manageclient->activityRates) || $manageclient->activityRates->isEmpty())
                    <p>No activities assigned.</p>
                @else
                    <table class="table-auto min-w-full">
                        <thead>
                            <tr>
                                <th class="w-60">Activity</th>
                                <th>Weekday<br>Rate</th>
                                <th>Saturday<br>Rate</th>
                                <th>Sunday<br>Rate</th>
                                <th>Public<br>Holiday Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($manageclient->activityRates as $activityRate)
                                <tr class="text-center">
                                    <td>{{ $activityRate->activity->activityname }}</td>
                                    <td>{{ $activityRate->weekdayhourlyrate }}</td>
                                    <td>{{ $activityRate->saturdayhourlyrate }}</td>
                                    <td>{{ $activityRate->sundayhourlyrate }}</td>
                                    <td>{{ $activityRate->publicholidayhourlyrate }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <!-- Page Navigation Buttons -->
        <div
            class="items-center grid grid-cols-1 gap-4 justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
            <!-- Back to manage clients index page -->
            <a href="{{ route('manageclients.index') }}"
                class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Back
            </a>
            <!-- To Edit Client page -->
            <a href="{{ route('manageclients.edit', $manageclient) }}"
                class="inline-flex items-center mx-4 px-6 py-4 bg-blue-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-blue-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Edit Client
            </a>
        </div>

    </div><!-- Close Form Container -->

</x-app-layout>
