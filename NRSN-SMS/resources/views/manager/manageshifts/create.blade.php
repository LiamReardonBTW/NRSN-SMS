<x-app-layout>

    <!-- Page Header Title -->
    <x-slot name="header">
        {{ __('Add Shift') }}
    </x-slot>

    <!-- Form Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">

        <!-- Add Shift Information Form -->
        <form method="post" action="{{ route('manageshifts.store') }}">
            @csrf

            <!-- Shift Information container -->
            <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

                <!-- Submitted By Dropdown -->
                <div class="mx-4 my-2">
                    <label for="submitted_by">Worker</label>
                    <select name="submitted_by" id="submitted_by" class="form-select rounded-md shadow-sm block w-full">
                        <option value="">Select a worker</option>
                        @foreach ($workers as $worker)
                            <option value="{{ $worker->id }}"
                                {{ old('submitted_by', '') == $worker->id ? 'selected' : '' }}>
                                {{ $worker->first_name }} {{ $worker->last_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('submitted_by')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Client Supported Dropdown -->
                <div class="mx-4 my-2">
                    <label for="client_supported">Client Supported</label>
                    <select name="client_supported" id="client_supported"
                        class="form-select rounded-md shadow-sm block w-full">
                        <option value="">Select a client</option>
                        @foreach ($clients as $client)
                            @if ($client->active)
                                <option value="{{ $client->id }}"
                                    {{ old('client_supported') == $client->id ? 'selected' : '' }}>
                                    {{ $client->first_name }} {{ $client->last_name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('client_supported')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Date -->
                <div class="mx-4 my-2">
                    <label for="date">Date</label>
                    <x-input type="date" name="date" id="date"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ old('date', '') }}" />
                    @error('date')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Expenses -->
                <div class="mx-4 my-2">
                    <label for="expenses">Expenses ($AUD)</label>
                    <x-input type="float" name="expenses" id="expenses"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ old('expenses', '') }}" />
                    @error('expenses')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- km Travelled -->
                <div class="mx-4 my-2">
                    <label for="km">Km Travelled</label>
                    <x-input type="float" name="km" id="km"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ old('km', '') }}" />
                    @error('km')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Hours Worked -->
                <div class="mx-4 my-2">
                    <label for="hours">Hours Worked</label>
                    <x-input type="float" name="hours" id="hours"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ old('hours', '') }}" />
                    @error('hours')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes -->
                <div class="mx-4 my-2">
                    <label for="notes">Shift Notes</label>
                    <x-input type="string" name="notes" id="notes"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ old('notes', '') }}" />
                    @error('notes')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div> <!-- Close shift information container -->

            <!-- Page Navigation Buttons  -->
            <div
                class="flex items-center justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
                <!-- Back to Manage Shifts page -->
                <a href="{{ route('manageshifts.index') }}"
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
