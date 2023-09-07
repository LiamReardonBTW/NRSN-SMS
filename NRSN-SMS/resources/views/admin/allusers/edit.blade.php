<x-app-layout>

    <!-- Page Header Title -->
    <x-slot name="header">
        <!-- Shows selected user first and last name -->
        {{ __('Edit User:') }} {{ $alluser->first_name }} {{ $alluser->last_name }}
    </x-slot>

    <!-- User Information Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">

        <!-- Update User Information Form -->
        <form method="post" action="{{ route('allusers.update', $alluser) }}">
            @csrf
            @method('PUT')

            <!-- Uneditable User Information -->
            <div class="text-2xl font-medium bg-blue-300 overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">
                <!-- User ID -->
                <div class="mx-4 my-5">
                    <label for="id">User ID</label>
                    <x-input disabled type="text" name="id" id="id"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $alluser->id }}" />
                </div>

                <!-- Added -->
                <div class="mx-4 my-5">
                    <label for="created_at">Added</label>
                    <x-input disabled type="text" name="created_at" id="created_at"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $alluser->created_at }}" />
                </div>

                <!-- Last Updated -->
                <div class="mx-4 my-5">
                    <label for="updated_at">Last Updated</label>
                    <x-input disabled type="text" name="updated_at" id="updated_at"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $alluser->updated_at }}" />
                </div>
            </div> <!-- Close uneditable user Information -->

            <!-- Editable User Information -->
            <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

                <!-- First Name -->
                <div class="mx-4 my-5">
                    <label for="first_name">First
                        Name</label>
                    <x-input type="text" name="first_name" id="first_name"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $alluser->first_name }}" />
                    @error('first_name')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Last Name -->
                <div class="mx-4 my-5">
                    <label for="last_name">Last Name</label>
                    <x-input type="text" name="last_name" id="last_name"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $alluser->last_name }}" />
                    @error('last_name')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mx-4 my-5">
                    <label for="email">Email</label>
                    <x-input type="email" name="email" id="email"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $alluser->email }}" />
                    @error('email')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div class="mx-4 my-5">
                    <label for="phone">Phone</label>
                    <x-input type="text" name="phone" id="phone"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $alluser->phone }}" />
                    @error('phone')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address -->
                <div class="mx-4 my-5">
                    <label for="address">Address</label>
                    <x-input type="text" name="address" id="address"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $alluser->address }}" />
                    @error('address')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- TFN -->
                <div class="mx-4 my-5">
                    <label for="tfn">Tax File Number (TFN)</label>
                    <x-input type="text" name="tfn" id="tfn"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $alluser->tfn }}" />
                    @error('tfn')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- ABN -->
                <div class="mx-4 my-5">
                    <label for="abn">ABN</label>
                    <x-input type="text" name="abn" id="abn"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $alluser->abn }}" />
                    @error('abn')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role -->
                <div class="mx-4 my-5">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-select rounded-md shadow-sm block w-full">
                        <option value="0" {{ $alluser->role === 0 ? 'selected' : '' }}>Admin</option>
                        <option value="1" {{ $alluser->role === 1 ? 'selected' : '' }}>Manager</option>
                        <option value="2" {{ $alluser->role === 2 ? 'selected' : '' }}>Worker</option>
                    </select>
                </div>

            </div> <!-- Close editable user Information -->

<!-- Clients Supported by the User -->
<div class="text-2xl font-medium overflow-hidden px-6 lg:px-8 mx-4 my-5">
    <h2 class="text-xl font-semibold mb-2">Clients Supported by {{ $alluser->first_name }}</h2>
    <div class="rounded-md bg-white shadow-md p-4 max-h-40 overflow-y-auto text-sm">
        <!-- Add text-sm class for smaller text -->
        <ul>
            @php
                $checkedClients = $alluser->supportedClients->sortBy('last_name');
                $uncheckedClients = $allClients->reject(function ($client) use ($checkedClients) {
                    return $checkedClients->contains($client);
                })->sortBy('last_name');
                $clients = $checkedClients->concat($uncheckedClients);
            @endphp
            @foreach ($clients as $client)
                <li class="flex items-center justify-between mb-2">
                    <!-- Use flex to align items horizontally -->
                    <label for="supported_client_{{ $client->id }}"
                        class="flex-grow">{{ $client->first_name }} {{ $client->last_name }}</label>
                    <input type="checkbox" id="supported_client_{{ $client->id }}"
                        name="supported_clients[]" value="{{ $client->id }}"
                        {{ $alluser->supportedClients->contains($client) ? 'checked' : '' }}>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<!-- Clients Managed by the User -->
<div class="text-2xl font-medium overflow-hidden px-6 lg:px-8 mx-4 my-5">
    <h2 class="text-xl font-semibold mb-2">Clients Managed by {{ $alluser->first_name }}</h2>
    <div class="rounded-md bg-white shadow-md p-4 max-h-40 overflow-y-auto text-sm">
        <!-- Add text-sm class for smaller text -->
        <ul>
            @php
                $checkedClients = $alluser->managedClients->sortBy('first_name');
                $uncheckedClients = $allClients->reject(function ($client) use ($checkedClients) {
                    return $checkedClients->contains($client);
                })->sortBy('first_name');
                $clients = $checkedClients->concat($uncheckedClients);
            @endphp
            @foreach ($clients as $client)
                <li class="flex items-center justify-between mb-2">
                    <!-- Use flex to align items horizontally -->
                    <label for="managed_client_{{ $client->id }}"
                        class="flex-grow">{{ $client->first_name }} {{ $client->last_name }}</label>
                    <input type="checkbox" id="managed_client_{{ $client->id }}"
                        name="managed_clients[]" value="{{ $client->id }}"
                        {{ $alluser->managedClients->contains($client) ? 'checked' : '' }}>
                </li>
            @endforeach
        </ul>
    </div>
</div>

            <!-- Page Navigation Buttons  -->
            <div
                class="flex items-center justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
                <!-- Back to All Users index page -->
                <a href="{{ route('allusers.show', $alluser) }}"
                    class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Back
                </a>
                <!-- Form Submit changes to user Button -->
                <button
                    class="inline-flex items-center mx-4 px-6 py-4 bg-green-800 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-green-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Submit
                </button>
            </div>

        </form> <!-- Close Form -->
    </div> <!-- Close Shift Information Container -->

</x-app-layout>
