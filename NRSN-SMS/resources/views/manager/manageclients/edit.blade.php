<x-app-layout>

    <!-- Page Header Title -->
    <x-slot name="header">
        <!-- Shows selected clients first and last name -->
        {{ __('Edit Client:') }} {{ $manageclient->first_name }} {{ $manageclient->last_name }}
    </x-slot>

    <!-- Form Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg">

        <!-- Client Information Container -->
        <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">

            <!-- Update Client Information Form -->
            <form method="post" action="{{ route('manageclients.update', $manageclient) }}">
                @csrf
                @method('PUT')

                <!-- Uneditable Client Information -->
                <div
                    class="text-2xl font-medium bg-blue-300 overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

                    <!-- Client ID -->
                    <div class="mx-4 my-5">
                        <label for="client_id">Client ID</label>
                        <x-input disabled type="text" name="client_id" id="client_id"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $manageclient->id }}" />
                    </div>

                    <!-- Added -->
                    <div class="mx-4 my-5">
                        <label for="created_at">Added</label>
                        <x-input disabled type="text" name="created_at" id="created_at"
                            class="form-input rounded-md shadow-sm block w-full"
                            value="{{ $manageclient->created_at }}" />
                    </div>

                    <!-- Last Updated -->
                    <div class="mx-4 my-5">
                        <label for="updated_at">Last Updated</label>
                        <x-input disabled type="text" name="updated_at" id="updated_at"
                            class="form-input rounded-md shadow-sm block w-full"
                            value="{{ $manageclient->updated_at }}" />
                    </div>

                    <div class="mx-4 my-5">
                        <h2>Client Contract</h2>
                        <ul class="py-2 font-normal text-base bg-white rounded-md shadow-sm block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            @if (is_null($manageclient->clientContracts) || $manageclient->clientContracts->isEmpty())
                                <li class="mx-2">No active contract</li>
                            @else
                                @php
                                    $activeContracts = $manageclient->clientContracts->where('active', true);
                                @endphp

                                @foreach ($activeContracts as $contract)
                                    @if ($contract->enddate) <!-- Check if enddate is not null -->
                                        <li class="mx-2">Active until:<br> {{ \Carbon\Carbon::parse($contract->enddate)->format('Y-m-d') }}</li>
                                    @else
                                        <li class="mx-2">No End Date</li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>

                </div><!-- End Uneditable Client Information -->

                <!-- Editable Client Information -->
                <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

                    <!-- First Name -->
                    <div class="mx-4 my-5">
                        <label for="first_name">First
                            Name</label>
                        <x-input type="text" name="first_name" id="first_name"
                            class="form-input rounded-md shadow-sm block w-full"
                            value="{{ $manageclient->first_name }}" />
                        @error('first_name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Last Name -->
                    <div class="mx-4 my-5">
                        <label for="last_name">Last Name</label>
                        <x-input type="text" name="last_name" id="last_name"
                            class="form-input rounded-md shadow-sm block w-full"
                            value="{{ $manageclient->last_name }}" />
                        @error('last_name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone # -->
                    <div class="mx-4 my-5">
                        <label for="phone">Phone #</label>
                        <x-input type="string" name="phone" id="phone"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $manageclient->phone }}" />
                        @error('phone')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mx-4 my-5">
                        <label for="email">Email</label>
                        <x-input type="email" name="email" id="email"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $manageclient->email }}" />
                        @error('email')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="mx-4 my-5">
                        <label for="address">Address</label>
                        <x-input type="text" name="address" id="address"
                            class="form-input rounded-md shadow-sm block w-full"
                            value="{{ $manageclient->address }}" />
                        @error('address')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Active Status -->
                    <div class="mx-4 my-5">
                        <label for="active">Active Status</label>
                        <select name="active" id="active" class="form-select rounded-md shadow-sm block w-full">
                            <option value="1" {{ $manageclient->active === '1' ? 'selected' : '' }}>Active
                            </option>
                            <option value="0" {{ $manageclient->active === 0 ? 'selected' : '' }}>Inactive
                            </option>
                        </select>
                    </div>

                </div><!-- Close Editable Information -->

                <!-- Clients Supported by the User -->
                <div class="text-2xl font-medium overflow-hidden px-6 lg:px-8 mx-4 my-5">
                    <h2 class="text-xl font-semibold mb-2">Supported By</h2>
                    <div class="rounded-md bg-white shadow-md p-4 max-h-40 overflow-y-auto text-sm">
                        <!-- Add text-sm class for smaller text -->
                        <ul>
                            @php
                                $checkedUsers = $manageclient->supportedByUser->sortBy('last_name');
                                $uncheckedUsers = $allUsers
                                    ->reject(function ($user) use ($checkedUsers) {
                                        return $checkedUsers->contains($user);
                                    })
                                    ->sortBy('last_name');
                                $users = $checkedUsers->concat($uncheckedUsers);
                            @endphp
                            @foreach ($users as $user)
                                <li class="flex items-center justify-between mb-2">
                                    <!-- Use flex to align items horizontally -->
                                    <label for="supported_by_{{ $user->id }}"
                                        class="flex-grow">{{ $user->first_name }} {{ $user->last_name }}</label>
                                    <input type="checkbox" id="supported_by_{{ $user->id }}" name="supported_by[]"
                                        value="{{ $user->id }}"
                                        {{ $manageclient->supportedByUser->contains($user) ? 'checked' : '' }}>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Clients Managed by the User -->
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

                <!-- Page Navigation Buttons  -->
                <div
                    class="flex items-center justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
                    <!-- Back to manage clients index page -->
                    <a href="{{ route('manageclients.show', $manageclient) }}"
                        class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Back
                    </a>
                    <!-- Form Submit changes to client Button -->
                    <button
                        class="inline-flex items-center mx-4 px-6 py-4 bg-green-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-green-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Submit
                    </button>
                </div>

            </form> <!-- Close Form -->
        </div> <!-- Close Client Information Container -->

    </div> <!-- Close Form Container -->

</x-app-layout>
