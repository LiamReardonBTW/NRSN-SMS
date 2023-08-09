<x-app-layout>

    <!-- Page Header Title -->
    <x-slot name="header">
        {{ __('Add Shift') }}
    </x-slot>

    <!-- Form Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">

        <!-- Add Shift Information Form -->
        <form method="post" action="{{ route('allshifts.store') }}">
            @csrf

            <!-- Shift Information container -->
            <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

                <!-- Invoice -->
                <div class="mx-4 my-2">
                    <label for="invoice">Invoice</label>
                    <x-input type="string" name="invoice" id="invoice"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ old('submitted_by', '') }}" />
                </div>

                <!-- Phone # -->
                <div class="mx-4 my-2">
                    <label for="submitted_by">Worker</label>
                    <x-input type="string" name="submitted_by" id="submitted_by"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ old('submitted_by', '') }}" />
                </div>

                <!-- Client Supported -->
                <div class="mx-4 my-2">
                    <label for="client_supported">Client Supported</label>
                    <x-input type="string" name="client_supported" id="client_supported"
                        class="form-input rounded-md shadow-sm block w-full"
                        value="{{ old('client_supported', '') }}" />
                </div>

                <!-- Date -->
                <div class="mx-4 my-2">
                    <label for="date">Date</label>
                    <x-input type="date" name="date" id="date"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ old('date', '') }}" />
                </div>

                <!-- Expenses -->
                <div class="mx-4 my-2">
                    <label for="expenses">Expenses ($AUD)</label>
                    <x-input type="integer" name="expenses" id="expenses"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ old('expenses', '') }}" />
                </div>

                <!-- km Travelled -->
                <div class="mx-4 my-2">
                    <label for="km">Km Travelled</label>
                    <x-input type="integer" name="km" id="km"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ old('km', '') }}" />
                </div>

                <!-- Hours Worked -->
                <div class="mx-4 my-2">
                    <label for="hours">Hours Worked</label>
                    <x-input type="integer" name="hours" id="hours"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ old('hours', '') }}" />
                </div>

                <!-- Notes -->
                <div class="mx-4 my-2">
                    <label for="notes">Shift Notes</label>
                    <x-input type="string" name="notes" id="notes"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ old('notes', '') }}" />
                </div>

            </div> <!-- Close shift information container -->

            <!-- Page Navigation Buttons  -->
            <div
                class="flex items-center justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
                <!-- Back to All Shifts page -->
                <a href="{{ route('allshifts.index') }}"
                    class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Back
                </a>
                <!-- Form Submit add shift -->
                <button
                    class="inline-flex items-center mx-4 px-6 py-4 bg-green-800 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-green-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Add Shift
                </button>
            </div>
        </form>
    </div><!-- Close Form Container -->

</x-app-layout>
