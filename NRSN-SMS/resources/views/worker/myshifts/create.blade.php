<x-app-layout>

    <!-- Page Header Title -->
    <x-slot name="header">
        {{ __('Add Shift') }}
    </x-slot>

    <!-- Form Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">

        <!-- Add Shift Information Form -->
        <form method="post" action="{{ route('myshifts.store') }}">
            @csrf

            <!-- Shift Information container -->
            <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

                <!-- Submitted By # -->
                <!-- Hidden Input for user_id -->
                <input type="hidden" name="submitted_by" id="submitted_by" value="{{ Auth::user()->id }}">
                <!-- Display User's First and Last Name -->
                <div class="mx-4 my-2">
                    <label for="submitted_by_display">Submitted By</label>
                    <input type="text" name="submitted_by_display" id="submitted_by_display"
                        class="form-input rounded-md shadow-sm block w-full"
                        value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" readonly>
                </div>

                <!-- Client Supported Dropdown -->
                <div class="mx-4 my-2">
                    <label for="client_supported">Client Supported</label>
                    <select name="client_supported" id="client_supported"
                        class="form-select rounded-md shadow-sm block w-full">
                        <option value="">Select a client</option>
                        @foreach ($clients as $client)
                            @if ($clientActivities[$client->id]->count() > 0)
                                <option value="{{ $client->id }}">{{ $client->first_name }} {{ $client->last_name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('client_supported')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Activity Dropdown -->
                <div class="mx-4 my-2">
                    <label for="activity_id">Activity</label>
                    <select name="activity_id" id="activity_id" class="form-select rounded-md shadow-sm block w-full">
                        <option value="">Select an activity</option>
                        <!-- This part will be populated dynamically with JavaScript based on the selected client -->
                    </select>
                    @error('activity_id')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <script>
                    // Get references to the select fields
                    const clientSelect = document.getElementById('client_supported');
                    const activitySelect = document.getElementById('activity_id');

                    // Define a JavaScript object to store the client-activity relationships
                    const clientActivities = @json($clientActivities);

                    // Function to update the activity dropdown based on the selected client
                    function updateActivityDropdown() {
                        // Get the selected client ID
                        const selectedClientId = clientSelect.value;

                        // Clear existing options in the activity dropdown
                        activitySelect.innerHTML = '<option value="">Select an activity</option>';

                        // If a client is selected, populate the activity dropdown with related activities
                        if (selectedClientId) {
                            const relatedActivities = clientActivities[selectedClientId] || [];
                            relatedActivities.forEach(activity => {
                                const option = document.createElement('option');
                                option.value = activity.id;
                                option.textContent = activity.activityname;
                                activitySelect.appendChild(option);
                            });
                        }
                    }

                    // Attach an event listener to the client dropdown to update the activity dropdown
                    clientSelect.addEventListener('change', updateActivityDropdown);

                    // Initial population of the activity dropdown
                    updateActivityDropdown();
                </script>

                <!-- Date -->
                <div class="mx-4 my-2">
                    <label for="date">Date</label>
                    <x-input type="date" name="date" id="date"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ old('date', '') }}" />
                    @error('date')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Is Public Holiday Dropdown -->
                <div class="mx-4 my-2">
                    <label for="is_public_holiday">Public Holiday?</label>
                    <select name="is_public_holiday" id="is_public_holiday"
                        class="form-select rounded-md shadow-sm block w-full">
                        <option value="1" {{ old('is_public_holiday') == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('is_public_holiday') == 0 ? 'selected' : '' }}>No</option>
                    </select>
                    @error('is_public_holiday')
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
                <!-- Back to My Shifts page -->
                <a href="{{ route('myshifts.index') }}"
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
