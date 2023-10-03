<x-app-layout>

    <!-- Page Header Title -->
    <x-slot name="header">
        <!-- Shows selected shift ID -->
        {{ __('My Shift ID:') }} {{ $myshift->id }}
    </x-slot>

    <!-- Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">

        <!-- ID, ISFLAGGED, ISINVOICED -->
        <div class="text-2xl font-medium bg-blue-300 overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

            <!-- Shift ID (UNEDITABLE) -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="id">Shift ID</label>
                <x-input disabled type="text" name="id" id="id"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $myshift->id }}" />
            </div>

            <!-- isflagged -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="isflagged">Flagged</label>
                @if ($myshift->isflagged)
                    <x-input disabled type="text" name="isinvoiced" id="isinvoiced"
                        class="form-input rounded-md shadow-sm block w-full" value="Yes" />
                @else
                    <x-input disabled type="text" name="isinvoiced" id="isinvoiced"
                        class="form-input rounded-md shadow-sm block w-full" value="No" />
                @endif
            </div>

            <!-- Worker Invoice -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="worker_invoice">Worker Invoice</label>
                @if ($myshift->workerinvoice_id)
                    <div
                        class="flex flex-col-1 justify-center py-1 text-center bg-white border-gray-300 rounded-md shadow-sm">
                        <a href="{{ $myshift->workerinvoice->pdf_path }}" target="_blank"
                            class="bg-green-500 px-2 text-white rounded-md">View</a>
                    </div>
                @else
                    <div
                        class="flex flex-col-1 justify-center py-1 text-center bg-white border-gray-300 rounded-md shadow-sm">
                        <span class="bg-red-500 px-2 text-white justify-center rounded-sm">Not Invoiced</span>
                    </div>
                @endif
            </div>
        </div>
        <div class="text-2xl font-medium bg-blue-300 overflow-hidden grid grid-cols-1 md:grid-cols-2 px-6 lg:px-8">
            <!-- Worker Total Pay -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="shift_id">My Pay</label>
                <span
                    class="px-4 my-1 rounded-md block w-full bg-white text-black">${{ $workerPays[$myshift->id] }}</span>
            </div>
        </div>

        <!-- Shift Information Container -->
        <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

            <!-- Invoice # -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="invoice">Invoice #</label>
                <x-input disabled type="text" name="invoice" id="invoice"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $myshift->invoice }}" />
            </div>

            <!-- Submitted By -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="submitted_by">Submitted By</label>
                <x-input disabled type="text" name="submitted_by" id="submitted_by"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="{{ $myshift->submittedByUser->first_name }} {{ $myshift->submittedByUser->last_name }}" />
            </div>

            <!-- Client Supported -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="client_supported">Client Supported</label>
                <x-input disabled type="text" name="client_supported" id="client_supported"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="{{ $myshift->clientSupported->first_name }} {{ $myshift->clientSupported->last_name }}" />
            </div>

            <!-- Activity Dropdown -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="activity_id">Activity</label>
                <select name="activity_id" id="activity_id" class="form-select rounded-md shadow-sm block w-full"
                    disabled>
                    @foreach ($activities as $activity)
                        <option value="{{ $activity->id }}"
                            {{ $myshift->activity_id == $activity->id ? 'selected' : '' }}>
                            {{ $activity->activityname }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Submission Date -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="submission_date">Submission Date</label>
                <x-input disabled type="text" name="submission_date" id="submission_date"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $myshift->date }}" />
            </div>

            <!-- Is Public Holiday Dropdown -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="is_public_holiday">Public Holiday?</label>
                <select disabled name="is_public_holiday" id="is_public_holiday"
                    class="form-select rounded-md shadow-sm block w-full">
                    <option value="1" {{ $myshift->is_public_holiday == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $myshift->is_public_holiday == 0 ? 'selected' : '' }}>No</option>
                </select>
                @error('is_public_holiday')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Expenses -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="expenses">Expenses ($AUD)</label>
                <x-input disabled type="text" name="expenses" id="expenses"
                    class="form-input rounded-md shadow-sm block w-full" value="${{ $myshift->expenses ?? '0' }}" />
            </div>

            <!-- km Travelled -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="km">Km Travelled</label>
                <x-input disabled type="text" name="km" id="km"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $myshift->km ?? '0' }}km" />
            </div>

            <!-- Hours  Worked -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="hours">Hours Worked</label>
                <x-input disabled type="text" name="hours" id="hours"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $myshift->hours }}" />
            </div>

            <!-- Shift Notes -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="notes">Notes</label>
                <x-input disabled type="string" name="notes" id="notes"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $myshift->notes }}" />
            </div>

        </div><!-- Close Shift Information Container -->

        <!-- Page Navigation Buttons -->
        <div
            class="items-center grid grid-cols-1 gap-4 justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
            <!-- Back to My Shifts page -->
            <a href="{{ route('myshifts.index') }}"
                class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Back
            </a>
            <!-- Form Submit add shift -->
            @if (!$myshift->approved)
                <!-- To Edit Shift page -->
                <a href="{{ route('myshifts.edit', $myshift) }}"
                    class="inline-flex items-center mx-4 px-6 py-4 bg-blue-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-blue-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Edit Shift
                </a>
            @endif
        </div>

    </div><!-- Close Container -->

</x-app-layout>
