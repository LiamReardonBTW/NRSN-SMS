<x-app-layout>

    <!-- Page Header Title -->
    <x-slot name="header">
        <!-- Shows selected user first and last name -->
        {{ __('User:') }} {{ $alluser->first_name }} {{ $alluser->last_name }}
    </x-slot>

    <!-- Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">

        <!-- ID, created at time, and last updated time -->
        <div class="text-2xl font-medium bg-blue-300 overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">
            <!-- ID -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                <label for="id">User ID</label>
                <x-input disabled type="text" name="id" id="id"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $alluser->id }}" />
            </div>

            <!-- Created_at -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                <label for="created_at">Added</label>
                <x-input disabled type="text" name="created_at" id="created_at"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $alluser->created_at }}" />
            </div>

            <!-- Last Updated -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                <label for="updated_at">Last Updated</label>
                <x-input disabled type="text" name="updated_at" id="updated_at"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $alluser->updated_at }}" />
            </div>

                <div class="mx-4 mt-5 grid grid-rows-3">
                <h2>Contract</h2>
                <ul
                    class="py-2 font-normal text-base bg-white rounded-md shadow-sm block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    @if ($alluser->userContracts->isEmpty() || !$alluser->userContracts->contains('active', true))
                        <li class="mx-2">No active contract</li>
                    @else
                        @foreach ($alluser->userContracts as $contract)
                            @if ($contract->active)
                                @if ($contract->enddate)
                                    <!-- Check if enddate is not null -->
                                    <div class="grid grid-cols-2">
                                        <li class="mx-2">Active until:<br>
                                            {{ \Carbon\Carbon::parse($contract->enddate)->format('Y-m-d') }}</li>
                                        <a href="{{ route('usercontracts.show', $alluser->id) }}">
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

        </div><!-- Close id,created,updated Container -->

        <!-- User Information Container -->
        <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

            <!-- First Name -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                <label for="first_name">First
                    Name</label>
                <x-input disabled type="text" name="first_name" id="first_name"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $alluser->first_name }}" />
            </div>

            <!-- Last Name -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                <label for="last_name">Last Name</label>
                <x-input disabled type="text" name="last_name" id="last_name"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $alluser->last_name }}" />
            </div>

            <!-- Email -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                <label for="email">Email</label>
                <x-input disabled type="email" name="email" id="email"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $alluser->email }}" />
            </div>

            <!-- PHONE -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                <label for="phone">Phone</label>
                <x-input disabled type="text" name="phone" id="phone"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $alluser->phone }}" />
            </div>
            <!-- ADDRESS -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                <label for="address">Address</label>
                <x-input disabled type="text" name="address" id="address"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $alluser->address }}" />
            </div>
            <!-- TFN -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                <label for="tfn">Tax File Number (TFN)</label>
                <x-input disabled type="text" name="tfn" id="tfn"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $alluser->tfn }}" />
            </div>

            <!-- ABN -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                <label for="abn">ABN</label>
                <x-input disabled type="text" name="abn" id="abn"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $alluser->abn }}" />
            </div>

            <!-- Role -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                <label for="abn">Role</label>
                <x-input disabled type="text" name="role" id="role"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="{{ $alluser->role == 0 ? 'Admin' : ($alluser->role == 1 ? 'Manager' : 'Worker') }}" />
            </div>

        </div> <!-- Close User Information Container -->

        <!-- Clients Supported by the User -->
        <div class="text-2xl font-medium overflow-hidden px-6 lg:px-8 mx-4 my-5">
            <h2 class="text-xl font-semibold mb-2">Supports</h2>
            <div class="rounded-md bg-white shadow-md p-4 max-h-40 overflow-y-auto text-sm">
                <!-- Add text-sm class for smaller text -->
                <ul>
                    @if ($alluser->supportedClients->isEmpty())
                        <li>No clients supported.</li>
                    @else
                        @foreach ($alluser->supportedClients->sortBy('last_name') as $client)
                            <li>{{ $client->first_name }} {{ $client->last_name }}</li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>

        <!-- Check if user is manager (or admin) before displaying clients managed section -->
        @if ($alluser->role == 0 || $alluser->role == 1)

            <!-- Clients Managed by the User -->
            <div class="text-2xl font-medium overflow-hidden px-6 lg:px-8 mx-4 my-5">
                <h2 class="text-xl font-semibold mb-2">Manages</h2>
                <div class="rounded-md bg-white shadow-md p-4 max-h-40 overflow-y-auto text-sm">
                    <!-- Add text-sm class for smaller text -->
                    <ul>
                        @if ($alluser->managedClients->isEmpty())
                            <li>No clients managed.</li>
                        @else
                            @foreach ($alluser->managedClients->sortBy('last_name') as $client)
                                <li>{{ $client->first_name }} {{ $client->last_name }}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        @endif

        <!-- Page Navigation Buttons -->
        <div
            class="items-center grid grid-cols-1 gap-4 justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
            <!-- Back to All Shifts index page -->
            <a href="{{ route('allusers.index') }}"
                class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Back
            </a>
            <!-- To Edit User page -->
            <a href="{{ route('allusers.edit', $alluser) }}"
                class="inline-flex items-center mx-4 px-6 py-4 bg-blue-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-blue-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Edit User
            </a>
        </div>

    </div><!-- Close Container -->

</x-app-layout>
