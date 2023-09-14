<x-app-layout>

    <!-- Page Header Title -->
    <x-slot name="header">
        <!-- Shows selected clients first and last name -->
        {{ __('Client Contract') }}
    </x-slot>

    <!-- Form Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">

        <!-- Contract Information Container -->
        <div class="text-2xl font-medium bg-blue-300 overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">
            <!-- Client ID -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="id">Contract ID</label>
                <x-input disabled type="int" name="id" id="id"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $clientcontract->id }}" />
            </div>
            <!-- Start Date -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="startdate">Contract Start Date</label>
                <x-input disabled type="date" name="startdate" id="startdate"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="{{ \Carbon\Carbon::parse($clientcontract->startdate)->format('Y-m-d') }}" />
            </div>
            <!-- Contract End Date -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="enddate">Contract End Date</label>
                <x-input disabled type="date" name="enddate" id="enddate"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="{{ \Carbon\Carbon::parse($clientcontract->enddate)->format('Y-m-d') }}" />
            </div>
        </div>
        <div class="text-2xl font-medium bg-blue-200 overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">
            <!-- Total Balance Allocated -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="totalallocated">Total Balance Allocated</label>
                <x-input disabled type="numeric" name="totalallocated" id="totalallocated"
                    class="form-input rounded-md shadow-sm block w-full" value="${{ $clientcontract->totalallocated }}" />
            </div>
            <!-- Contract Balance -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="startdate">Balance</label>
                <x-input disabled type="numeric" name="balance" id="balance"
                    class="form-input rounded-md shadow-sm block w-full" value="${{ $clientcontract->balance }}" />
            </div>
            <!-- Weekday Hourly Rate -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="weekdayhourlyrate">Weekday Hourly Rate</label>
                <x-input disabled type="numeric" name="weekdayhourlyrate" id="weekdayhourlyrate"
                    class="form-input rounded-md shadow-sm block w-full" value="${{ $clientcontract->weekdayhourlyrate }}" />
            </div>
            <!-- Saturday Hourly Rate -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="saturdayhourlyrate">Saturday Hourly Rate</label>
                <x-input disabled type="numeric" name="saturdayhourlyrate" id="saturdayhourlyrate"
                    class="form-input rounded-md shadow-sm block w-full" value="${{ $clientcontract->saturdayhourlyrate }}" />
            </div>
            <!-- Sunday Hourly Rate -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="sundayhourlyrate">Sunday Hourly Rate</label>
                <x-input disabled type="numeric" name="sundayhourlyrate" id="sundayhourlyrate"
                    class="form-input rounded-md shadow-sm block w-full" value="${{ $clientcontract->sundayhourlyrate }}" />
            </div>
            <!-- Public Holiday Hourly Rate -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="publicholidayhourlyrate">Public Holiday Hourly Rate</label>
                <x-input disabled type="numeric" name="publicholidayhourlyrate" id="publicholidayhourlyrate"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="${{ $clientcontract->publicholidayhourlyrate }}" />
            </div>
        </div>
    </div>

    <!-- Page Navigation Buttons -->
    <div
        class="flex items-center justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
        <!-- Back to manage clients index page -->
        <a href="{{ route('clientcontracts.index') }}"
            class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
            Back
        </a>
    </div>
</x-app-layout>
