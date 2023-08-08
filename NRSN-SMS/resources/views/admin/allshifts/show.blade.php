<x-app-layout>
    <x-slot name="header">
        Shift ID: {{ $allshift->id }}

    </x-slot>

    <div class="max-w-screen-2xl px-4 lg:px-8">

        <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">
            <form>
                @csrf

                <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

                    <!-- Shift ID -->
                    <div class="mx-4 my-5">
                        <label for="shift_id">Shift ID</label>
                        <x-input disabled type="text" name="shift_id" id="shift_id"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $allshift->id }}" />
                    </div>

                    <div class="mx-4 my-5">
                        <label for="invoice">Invoice</label>
                        <x-input disabled type="text" name="invoice" id="invoice"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $allshift->invoice }}" />
                    </div>

                    <div class="mx-4 my-5">
                        <label for="submitted_by">Submitted By</label>
                        <x-input disabled type="text" name="submitted_by" id="submitted_by"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $allshift->submitted_by }}" />
                    </div>

                    <div class="mx-4 my-5">
                        <label for="client_supported">Client Supported</label>
                        <x-input disabled type="text" name="client_supported" id="client_supported"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $allshift->client_supported }}" />
                    </div>

                    <div class="mx-4 my-5">
                        <label for="notes">Notes</label>
                        <x-input disabled type="string" name="notes" id="notes"
                            class="form-input rounded-md shadow-sm block w-full"
                            value="{{ $allshift->notes }}" />
                    </div>

                    <div class="mx-4 my-5">
                        <label for="submission_date">Submission Date</label>
                        <x-input disabled type="text" name="submission_date" id="submission_date"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $allshift->date }}" />
                    </div>

                    <div class="mx-4 my-5">
                        <label for="expenses">Expenses ($AUD)</label>
                        <x-input disabled type="text" name="expenses" id="expenses"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $allshift->expenses }}" />
                    </div>

                    <div class="mx-4 my-5">
                        <label for="Km">Km Travelled</label>
                        <x-input disabled type="text" name="Km" id="Km"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $allshift->Km }}" />
                    </div>

                    <div class="mx-4 my-5">
                        <label for="hours">Hours Worked</label>
                        <x-input disabled type="text" name="hours" id="hours"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $allshift->hours }}" />
                    </div>

                    <div class="mx-4 my-5">
                        <label for="isflagged">Flagged</label>
                        @if ($allshift->isflagged)
                        <x-input disabled type="text" name="isinvoiced" id="isinvoiced"
                            class="form-input rounded-md shadow-sm block w-full"
                            value="Yes" />
                        @else
                        <x-input disabled type="text" name="isinvoiced" id="isinvoiced"
                            class="form-input rounded-md shadow-sm block w-full"
                            value="No" />
                        @endif
                     </div>

                    <div class="mx-4 my-5">
                        <label for="isinvoiced">Invoiced</label>
                        @if ($allshift->isinvoiced)
                        <x-input disabled type="text" name="isinvoiced" id="isinvoiced"
                            class="form-input rounded-md shadow-sm block w-full"
                            value="Yes" />
                        @else
                        <x-input disabled type="text" name="isinvoiced" id="isinvoiced"
                            class="form-input rounded-md shadow-sm block w-full"
                            value="No" />
                        @endif
                    </div>

                </div>

            </form>
            <div
                class="flex items-center justify-start pb-6 py-5 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
                <a href="{{  route('allshifts.index') }}"
                    class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Back
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
