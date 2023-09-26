<x-app-layout>

    <!-- Page Header Title -->
    <x-slot name="header">
        <!-- Shows selected shift ID -->
        {{ __('Edit Shift ID:') }} {{ $allshift->id }}
    </x-slot>

    <!-- Shift Information Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">

        <!-- Update Shift Information Form -->
        <form method="post" action="{{ route('allshifts.update', $allshift) }}">
            @csrf
            @method('PUT')

            <!-- ID, ISFLAGGED, ISINVOICED -->
            <div class="text-2xl font-medium bg-blue-300 overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

                <!-- Shift ID (UNEDITABLE) -->
                <div class="mx-4 my-5">
                    <label for="id">Shift ID</label>
                    <x-input disabled type="text" name="id" id="id"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $allshift->id }}" />
                </div>

                <!-- isflagged -->
                <div class="mx-4 my-5">
                    <label for="isflagged">Flagged</label>
                    <select type="boolean" name="isflagged" id="isflagged"
                        class="form-select rounded-md shadow-sm block w-full">
                        <option value="1" {{ $allshift->isflagged === 1 ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ $allshift->isflagged === 0 ? 'selected' : '' }}>No</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>

                <!-- isinvoiced -->
                <div class="mx-4 my-5">
                    <label for="isinvoiced">Invoiced</label>
                    <select type="boolean" name="isinvoiced" id="isinvoiced"
                        class="form-select rounded-md shadow-sm block w-full">
                        <option value="1" {{ $allshift->isinvoiced === 1 ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ $allshift->isinvoiced === 0 ? 'selected' : '' }}>No</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>

            </div>

            <!-- Shift Information -->
            <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

                <!-- Invoice -->
                <div class="mx-4 my-5">
                    <label for="invoice">Invoice #</label>
                    <x-input type="text" name="invoice" id="invoice"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $allshift->invoice }}" />
                    @error('invoice')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submitted By -->
                <div class="mx-4 my-5">
                    <label for="submitted_by">Submitted By</label>
                    <x-input type="text" name="submitted_by" id="submitted_by_display"
                        class="form-input rounded-md shadow-sm block w-full"
                        value="{{ $allshift->submittedByUser->first_name }} {{ $allshift->submittedByUser->last_name }}"
                        disabled />
                    <input type="hidden" name="submitted_by" id="submitted_by"
                        value="{{ $allshift->submittedByUser->id }}" />
                </div>

                <!-- Client Supported -->
                <div class="mx-4 my-5">
                    <label for="client_supported">Client Supported</label>
                    <x-input type="text" name="client_supported" id="client_supported_display"
                        class="form-input rounded-md shadow-sm block w-full"
                        value="{{ $allshift->clientSupported->first_name }} {{ $allshift->clientSupported->last_name }}"
                        disabled />
                    <input type="hidden" name="client_supported" id="client_supported"
                        value="{{ $allshift->clientSupported->id }}" />
                </div>

                <!-- Activity Dropdown -->
                <div class="mx-4 my-5">
                    <label for="activity_id">Activity</label>
                    <select name="activity_id" id="activity_id" class="form-select rounded-md shadow-sm block w-full">
                        <option value="">Select an activity</option>
                        @foreach ($clientActivities[$allshift->clientSupported->id] as $activity)
                            <option value="{{ $activity->id }}"
                                {{ $allshift->activity_id == $activity->id ? 'selected' : '' }}>
                                {{ $activity->activityname }}
                            </option>
                        @endforeach
                    </select>
                    @error('activity_id')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submission Date -->
                <div class="mx-4 my-5">
                    <label for="date">Submission Date</label>
                    <x-input type="date" name="date" id="date"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $allshift->date }}" />
                    @error('date')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Is Public Holiday Dropdown -->
                <div class="mx-4 my-5">
                    <label for="is_public_holiday">Public Holiday?</label>
                    <select name="is_public_holiday" id="is_public_holiday"
                        class="form-select rounded-md shadow-sm block w-full">
                        <option value="1" {{ $allshift->is_public_holiday == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ $allshift->is_public_holiday == 0 ? 'selected' : '' }}>No</option>
                    </select>
                    @error('is_public_holiday')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Expenses -->
                <div class="mx-4 my-5">
                    <label for="expenses">Expenses ($AUD)</label>
                    <x-input type="float" name="expenses" id="expenses"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $allshift->expenses }}" />
                    @error('expenses')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- km Travelled -->
                <div class="mx-4 my-5">
                    <label for="km">Km Travelled</label>
                    <x-input type="float" name="km" id="km"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $allshift->km }}" />
                    @error('km')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Hours Worked -->
                <div class="mx-4 my-5">
                    <label for="hours">Hours Worked</label>
                    <x-input type="float" name="hours" id="hours"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $allshift->hours }}" />
                    @error('hours')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Shift Notes -->
                <div class="mx-4 my-5">
                    <label for="notes">Notes</label>
                    <x-input type="text" name="notes" id="notes"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $allshift->notes }}" />
                    @error('notes')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div> <!-- Close Shift Information -->

            <!-- Page Navigation Buttons  -->
            <div
                class="flex items-center justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
                <!-- Back to All Shifts index page -->
                <a href="{{ route('allshifts.show', $allshift) }}"
                    class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Back
                </a>
                <!-- Form Submit changes to shift Button -->
                <button
                    class="inline-flex items-center mx-4 px-6 py-4 bg-green-800 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-green-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Submit
                </button>
            </div>

        </form> <!-- Close Form -->
    </div> <!-- Close Shift Information Container -->

</x-app-layout>
