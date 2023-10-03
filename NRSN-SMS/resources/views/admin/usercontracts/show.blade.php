<x-app-layout>

    <!-- Page Header Title -->
    <x-slot name="header">
        <!-- Shows selected clients first and last name -->
        {{ __('User Contract:') }} {{ $usercontract->user->first_name }} {{ $usercontract->user->last_name }}
    </x-slot>

    <!-- Form Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">

        <!-- Contract Information Container -->
        <div class="text-2xl font-medium bg-blue-300 overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">
            <!-- User -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="client_id">User</label>
                <x-input disabled type="text" name="client_name" id="client_name"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="{{ $usercontract->user->first_name }} {{ $usercontract->user->last_name }}" />
            </div>
            <!-- Start Date -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="startdate">Contract Start Date</label>
                <x-input disabled type="date" name="startdate" id="startdate"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="{{ \Carbon\Carbon::parse($usercontract->startdate)->format('Y-m-d') }}" />
            </div>
            <!-- Contract End Date -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="enddate">Contract End Date</label>
                <x-input disabled type="date" name="enddate" id="enddate"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="{{ \Carbon\Carbon::parse($usercontract->enddate)->format('Y-m-d') }}" />
            </div>
        </div>
        <div class="text-2xl font-medium bg-blue-200 overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">
            <!-- Weekday Hourly Rate -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="weekdayhourlyrate">Weekday Hourly Rate</label>
                <x-input disabled type="numeric" name="weekdayhourlyrate" id="weekdayhourlyrate"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="${{ $usercontract->weekdayhourlyrate }}" />
            </div>
            <!-- Saturday Hourly Rate -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="saturdayhourlyrate">Saturday Hourly Rate</label>
                <x-input disabled type="numeric" name="saturdayhourlyrate" id="saturdayhourlyrate"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="${{ $usercontract->saturdayhourlyrate }}" />
            </div>
            <!-- Sunday Hourly Rate -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="sundayhourlyrate">Sunday Hourly Rate</label>
                <x-input disabled type="numeric" name="sundayhourlyrate" id="sundayhourlyrate"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="${{ $usercontract->sundayhourlyrate }}" />
            </div>
            <!-- Public Holiday Hourly Rate -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="publicholidayhourlyrate">Public Holiday Hourly Rate</label>
                <x-input disabled type="numeric" name="publicholidayhourlyrate" id="publicholidayhourlyrate"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="${{ $usercontract->publicholidayhourlyrate }}" />
            </div>
            <!-- Km Rate -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="km_rate">Km Rate</label>
                <x-input disabled type="numeric" name="km_rate" id="km_rate"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="${{ $usercontract->km_rate }}" />
            </div>

            <!-- Active Status -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="active">Active Status</label>
                <select disabled name="active" id="active" class="form-select rounded-md shadow-sm block w-full">
                    <option value="1" {{ $usercontract->active === '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $usercontract->active === 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

        </div>

        <!-- Page Navigation Buttons -->
        <div
            class="items-center grid grid-cols-1 gap-4 justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
            <!-- Back to manage clients index page -->
            <a href="{{ route('usercontracts.index') }}"
                class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Back
            </a>
            <!-- To Edit Contract page -->
            <a href="{{ route('usercontracts.edit', $usercontract) }}"
                class="inline-flex items-center mx-4 px-6 py-4 bg-blue-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-blue-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Edit Contract
            </a>
        </div>

    </div>

</x-app-layout>
