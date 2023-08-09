<x-app-layout>
    <x-slot name="header">
        My Shift ID: {{ $myshift->id }}

    </x-slot>

    <div class="max-w-screen-2xl px-4 lg:px-8">

        <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">
            <form method="post" action="{{ route('myshifts.update', $myshift) }}">
                @csrf
                @method('PUT')
                <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

                    <!-- First Name -->
                    <div class="mx-4 my-5">
                        <label for="id">Shift ID</label>
                        <x-input disabled type="text" name="id" id="id"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $myshift->id }}" />
                    </div>

                    <div class="mx-4 my-5">
                        <label for="invoice">Invoice</label>
                        <x-input type="text" name="invoice" id="invoice"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $myshift->invoice }}" />
                    </div>

                    <div class="mx-4 my-5">
                        <label for="submitted_by">Submitted By</label>
                        <x-input type="text" name="submitted_by" id="submitted_by"
                            class="form-input rounded-md shadow-sm block w-full"
                            value="{{ $myshift->submitted_by }}" />
                    </div>

                    <div class="mx-4 my-5">
                        <label for="client_supported">Client Supported</label>
                        <x-input type="text" name="client_supported" id="client_supported"
                            class="form-input rounded-md shadow-sm block w-full"
                            value="{{ $myshift->client_supported }}" />
                    </div>

                    <div class="mx-4 my-5">
                        <label for="notes">Notes</label>
                        <x-input type="text" name="notes" id="notes"
                            class="form-input rounded-md shadow-sm block w-full"
                            value="{{ $myshift->notes }}" />
                    </div>

                    <div class="mx-4 my-5">
                        <label for="date">Submission Date</label>
                        <x-input type="date" name="date" id="date"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $myshift->date }}" />
                    </div>

                    <div class="mx-4 my-5">
                        <label for="expenses">Expenses ($AUD)</label>
                        <x-input type="integer" name="expenses" id="expenses"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $myshift->expenses }}" />
                    </div>

                    <div class="mx-4 my-5">
                        <label for="km">Km Travelled</label>
                        <x-input type="integer" name="km" id="km"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $myshift->Km }}" />
                    </div>

                    <div class="mx-4 my-5">
                        <label for="hours">Hours Worked</label>
                        <x-input type="integer" name="hours" id="hours"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $myshift->hours }}" />
                    </div>

                    <!-- FLAGGED -->
                    <div class="mx-4 my-5">
                        <label for="isflagged">Flagged</label>
                        <select type="boolean" name="isflagged" id="isflagged" class="form-select rounded-md shadow-sm block w-full">
                            <option value="1" {{ $myshift->isflagged === 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ $myshift->isflagged === 0 ? 'selected' : '' }}>No</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>

                    <!-- INVOICED -->
                    <div class="mx-4 my-5">
                        <label for="isinvoiced">Invoiced</label>
                        <select type="boolean" name="isinvoiced" id="isinvoiced" class="form-select rounded-md shadow-sm block w-full">
                            <option value="1" {{ $myshift->isinvoiced === 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ $myshift->isinvoiced === 0 ? 'selected' : '' }}>No</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>

                </div>
                <div
                    class="flex items-center justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
                    <a href="{{ route('myshifts.index') }}"
                        class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Back
                    </a>
                    <button
                        class="inline-flex items-center mx-4 px-6 py-4 bg-green-800 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-green-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Submit
                    </button>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>
