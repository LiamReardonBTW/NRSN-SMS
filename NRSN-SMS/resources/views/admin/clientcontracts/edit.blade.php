<x-app-layout>

    <!-- Page Header Title -->
    <x-slot name="header">
        <!-- Shows selected clients first and last name -->
        {{ __('Editing Client Contract:') }} {{ $clientcontract->client->first_name }}
        {{ $clientcontract->client->last_name }}
    </x-slot>

    <!-- Form Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">

        <form method="post" action="{{ route('clientcontracts.update', $clientcontract) }}">
            @csrf
            @method('PUT')

            <!-- Uneditable Contract Information -->
            <div class="text-2xl font-medium bg-blue-300 overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

                <!-- Client -->
                <div class="mx-4 my-5 grid grid-rows-2">
                    <label for="client_id">Client</label>
                    <x-input disabled type="text" name="client_id" id="client_id"
                        class="form-input rounded-md shadow-sm block w-full"
                        value="{{ $clientcontract->client->first_name }} {{ $clientcontract->client->last_name }}" />
                    @error('client_id')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Start Date -->
                <div class="mx-4 my-5 grid grid-rows-2">
                    <label for="startdate">Contract Start Date</label>
                    <x-input type="date" name="startdate" id="startdate"
                        class="form-input rounded-md shadow-sm block w-full"
                        value="{{ \Carbon\Carbon::parse($clientcontract->startdate)->format('Y-m-d') }}" />
                    @error('startdate')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Contract End Date -->
                <div class="mx-4 my-5 grid grid-rows-2">
                    <label for="enddate">Contract End Date</label>
                    <x-input type="date" name="enddate" id="enddate"
                        class="form-input rounded-md shadow-sm block w-full"
                        value="{{ \Carbon\Carbon::parse($clientcontract->enddate)->format('Y-m-d') }}" />
                    @error('enddate')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Editable Contract Information -->
            <div class="text-2xl font-medium bg-blue-200 overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

                <!-- Total Balance Allocated -->
                <div class="mx-4 my-5 grid grid-rows-2">
                    <label for="totalallocated">Total Balance Allocated</label>
                    <x-input type="numeric" name="totalallocated" id="totalallocated"
                        class="form-input rounded-md shadow-sm block w-full"
                        value="{{ $clientcontract->totalallocated }}" />
                    @error('totalallocated')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Contract Balance -->
                <div class="mx-4 my-5 grid grid-rows-2">
                    <label for="balance">Balance</label>
                    <x-input type="numeric" name="balance" id="balance"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $clientcontract->balance }}" />
                    @error('balance')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Km Rate -->
                <div class="mx-4 my-5 grid grid-rows-2">
                    <label for="km_rate">Km Rate</label>
                    <x-input type="numeric" name="km_rate" id="km_rate"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $clientcontract->km_rate }}" />
                    @error('km_rate')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Active Status -->
                <div class="mx-4 my-5 grid grid-rows-2">
                    <label for="active">Active Status</label>
                    <select name="active" id="active" class="form-select rounded-md shadow-sm block w-full">
                        <option value="1" {{ $clientcontract->active === '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $clientcontract->active === 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('active')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <!-- Page Navigation Buttons -->
            <div
                class="items-center grid grid-cols-1 gap-4 justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
                <!-- Back to manage clients index page -->
                <a href="{{ route('clientcontracts.show', $clientcontract) }}"
                    class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Back
                </a>
                <!-- Form Submit changes to client Button -->
                <button
                    class="inline-flex items-center mx-4 px-6 py-4 bg-green-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-green-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Submit
                </button>
            </div>
    </div>

</x-app-layout>
