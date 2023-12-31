<x-app-layout>

    <!-- Page Header Title -->
    <x-slot name="header">
        <!-- Shows selected clients first and last name -->
        {{ __('Edit Client:') }} {{ $allclient->first_name }} {{ $allclient->last_name }}
    </x-slot>

    <!-- Client Information Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">

        <!-- Update Client Information Form -->
        <form method="post" action="{{ route('allclients.update', $allclient) }}">
            @csrf
            @method('PUT')

            <!-- Uneditable Client Information -->
            <div class="text-2xl font-medium  bg-blue-300 overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">
                <!-- Client ID -->
 <div class="mx-4 mt-5 grid grid-rows-3">
                    <label for="client_id">Client ID</label>
                    <x-input disabled type="text" name="client_id" id="client_id"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $allclient->id }}" />
                    @error('client_id')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Added -->
 <div class="mx-4 mt-5 grid grid-rows-3">
                    <label for="created_at">Added</label>
                    <x-input disabled type="text" name="created_at" id="created_at"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $allclient->created_at }}" />
                    @error('created_at')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Last Updated -->
 <div class="mx-4 mt-5 grid grid-rows-3">
                    <label for="updated_at">Last Updated</label>
                    <x-input disabled type="text" name="updated_at" id="updated_at"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $allclient->updated_at }}" />
                    @error('updated_at')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

 <div class="mx-4 mt-5 grid grid-rows-3">
                    <h2>Client Contract</h2>
                    <ul
                        class="py-2 font-normal text-base bg-white rounded-md shadow-sm block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        @if (is_null($allclient->clientContracts) || $allclient->clientContracts->isEmpty())
                            <li class="mx-2">No Contract</li>
                        @else
                            @php
                                $activeContracts = $allclient->clientContracts->where('active', true);
                            @endphp

                            @foreach ($activeContracts as $contract)
                                @if ($contract->enddate)
                                    <!-- Check if enddate is not null -->
                                    <li class="mx-2">Active until:<br>
                                        {{ \Carbon\Carbon::parse($contract->enddate)->format('Y-m-d') }}</li>
                                @else
                                    <li class="mx-2">No End Date</li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>

            </div><!-- End Uneditable Client Information -->

            <!-- Editable Client Information -->
            <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

                <!-- First Name -->
 <div class="mx-4 mt-5 grid grid-rows-3">
                    <label for="first_name">First
                        Name</label>
                    <x-input type="text" name="first_name" id="first_name"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $allclient->first_name }}" />
                    @error('first_name')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Last Name -->
 <div class="mx-4 mt-5 grid grid-rows-3">
                    <label for="last_name">Last Name</label>
                    <x-input type="text" name="last_name" id="last_name"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $allclient->last_name }}" />
                    @error('last_name')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone # -->
 <div class="mx-4 mt-5 grid grid-rows-3">
                    <label for="phone">Phone #</label>
                    <x-input type="string" name="phone" id="phone"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $allclient->phone }}" />
                    @error('phone')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
 <div class="mx-4 mt-5 grid grid-rows-3">
                    <label for="email">Email</label>
                    <x-input type="email" name="email" id="email"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $allclient->email }}" />
                    @error('email')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address -->
 <div class="mx-4 mt-5 grid grid-rows-3">
                    <label for="address">Address</label>
                    <x-input type="text" name="address" id="address"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $allclient->address }}" />
                    @error('address')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Active Status -->
 <div class="mx-4 mt-5 grid grid-rows-3">
                    <label for="active">Active Status</label>
                    <select name="active" id="active" class="form-select rounded-md shadow-sm block w-full">
                        <option value="1" {{ $allclient->active === '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $allclient->active === 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('active')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div><!-- Close Editable Information -->

            <!-- Clients Supported by the User -->
            <div class="text-2xl font-medium overflow-hidden px-6 lg:px-8 mx-4 my-5">
                <h2 class="text-xl font-semibold mb-2">Supported By</h2>
                <div class="rounded-md bg-white shadow-md p-4 max-h-40 overflow-y-auto text-sm">
                    <!-- Add text-sm class for smaller text -->
                    <ul>
                        @php
                            $checkedUsers = $allclient->supportedByUser->sortBy('last_name');
                            $uncheckedUsers = $allUsers
                                ->reject(function ($user) use ($checkedUsers) {
                                    return $checkedUsers->contains($user);
                                })
                                ->sortBy('last_name');
                            $users = $checkedUsers->concat($uncheckedUsers);
                        @endphp
                        @foreach ($users as $user)
                            <li class="flex items-center justify-between mb-2">
                                <!-- Use flex to align items horizontally -->
                                <label for="supported_by_{{ $user->id }}"
                                    class="flex-grow">{{ $user->first_name }} {{ $user->last_name }}</label>
                                <input type="checkbox" id="supported_by_{{ $user->id }}" name="supported_by[]"
                                    value="{{ $user->id }}"
                                    {{ $allclient->supportedByUser->contains($user) ? 'checked' : '' }}>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Clients Managed by the User -->
            <div class="text-2xl font-medium overflow-hidden px-6 lg:px-8 mx-4 my-5">
                <h2 class="text-xl font-semibold mb-2">Managed By</h2>
                <div class="rounded-md bg-white shadow-md p-4 max-h-40 overflow-y-auto text-sm">
                    <!-- Add text-sm class for smaller text -->
                    <ul>
                        @php
                            $checkedUsers = $allclient->managedByUser->sortBy('last_name');
                            $uncheckedUsers = $allUsers
                                ->reject(function ($user) use ($checkedUsers) {
                                    return $checkedUsers->contains($user);
                                })
                                ->sortBy('last_name');
                            $users = $checkedUsers->concat($uncheckedUsers);
                        @endphp
                        @foreach ($users as $user)
                            @if ($user->role == 0 || $user->role == 1)
                                <li class="flex items-center justify-between mb-2">
                                    <!-- Use flex to align items horizontally -->
                                    <label for="managed_by_{{ $user->id }}"
                                        class="flex-grow">{{ $user->first_name }} {{ $user->last_name }}</label>
                                    <input type="checkbox" id="managed_by_{{ $user->id }}" name="managed_by[]"
                                        value="{{ $user->id }}"
                                        {{ $allclient->managedByUser->contains($user) ? 'checked' : '' }}>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Update Client Information Button  -->
            <div class="flex items-center justify-start py-3 text-right px-6 lg:px-8 mx-4 my-5">
                <!-- Form Submit changes to client Button -->
                <button
                    class="inline-flex min-w-full items-center px-6 py-4 bg-green-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-green-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Update Client Information
                </button>
            </div>
        </form> <!-- Close Form -->

    </div> <!-- Close Client Information Container -->

    <!-- Client Activities Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg my-6">

        <!-- Activity Section -->
        <div class="text-2xl font-medium overflow-hidden px-6 lg:px-8 mx-4 my-5">
            <h2 class="text-xl font-semibold mb-2">Activities</h2>
            <div class="rounded-md bg-white shadow-md p-4 overflow-y-auto text-sm">
                <!-- Add text-sm class for smaller text -->
                <form method="post" action="{{ route('admin.allclients.sync-activities', $allclient) }}"
                    onsubmit="return validateForm()">
                    @csrf
                    @method('PUT')

                    @php
                        $selectedActivities = $allclient->activityRates->pluck('activity_id')->all();
                    @endphp

                    <!-- Display existing related activities first -->
                    @foreach ($allActivities as $activity)
                        @if (in_array($activity->id, $selectedActivities))
                            @php
                                $activityRate = $allclient
                                    ->activityRates()
                                    ->where('activity_id', $activity->id)
                                    ->first();
                            @endphp
                            <div class="mb-8">
                                <!-- Existing related activity checkbox -->
                                <label for="activity_{{ $activity->id }}" class="font-bold text-xl">
                                    <input type="checkbox" id="activity_{{ $activity->id }}" name="activities[]"
                                        value="{{ $activity->id }}" checked>
                                    {{ $activity->activityname }}
                                </label>
                                <!-- Input fields for rates for each activity -->
                                <div class="grid grid-cols-4 gap-10 mx-16">
                                    <div class="grid grid-rows-2">
                                        <label for="rates[{{ $activity->id }}][weekdayhourlyrate]"
                                            class="block mt-5">Weekday Rate</label>
                                        <input type="text" id="rates[{{ $activity->id }}][weekdayhourlyrate]"
                                            name="rates[{{ $activity->id }}][weekdayhourlyrate]"
                                            class="form-input rounded-md shadow-sm block w-full"
                                            value="{{ old('rates.' . $activity->id . '.weekdayhourlyrate', optional($allclient->activityRates->where('activity_id', $activity->id)->first())->weekdayhourlyrate ?? '') }}"
                                            data-activity-id="{{ $activity->id }}">
                                    </div>
                                    <div class="grid grid-rows-2">
                                        <label for="rates[{{ $activity->id }}][saturdayhourlyrate]"
                                            class="block mt-5">Saturday Rate</label>
                                        <input type="text" id="rates[{{ $activity->id }}][saturdayhourlyrate]"
                                            name="rates[{{ $activity->id }}][saturdayhourlyrate]"
                                            class="form-input rounded-md shadow-sm block w-full"
                                            value="{{ old('rates.' . $activity->id . '.saturdayhourlyrate', optional($allclient->activityRates->where('activity_id', $activity->id)->first())->saturdayhourlyrate ?? '') }}">
                                    </div>
                                    <div class="grid grid-rows-2">
                                        <label for="rates[{{ $activity->id }}][sundayhourlyrate]"
                                            class="block mt-5">Sunday Rate</label>
                                        <input type="text" id="rates[{{ $activity->id }}][sundayhourlyrate]"
                                            name="rates[{{ $activity->id }}][sundayhourlyrate]"
                                            class="form-input rounded-md shadow-sm block w-full"
                                            value="{{ old('rates.' . $activity->id . '.sundayhourlyrate', optional($allclient->activityRates->where('activity_id', $activity->id)->first())->sundayhourlyrate ?? '') }}">
                                    </div>
                                    <div class="grid grid-rows-2">
                                        <label for="rates[{{ $activity->id }}][publicholidayhourlyrate]"
                                            class="block mt-5">Public Holiday Rate</label>
                                        <input type="text"
                                            id="rates[{{ $activity->id }}][publicholidayhourlyrate]"
                                            name="rates[{{ $activity->id }}][publicholidayhourlyrate]"
                                            class="form-input rounded-md shadow-sm block w-full"
                                            value="{{ old('rates.' . $activity->id . '.publicholidayhourlyrate', optional($allclient->activityRates->where('activity_id', $activity->id)->first())->publicholidayhourlyrate ?? '') }}">
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <!-- Display remaining activities (not related yet) -->
                    @foreach ($allActivities as $activity)
                        @if (!in_array($activity->id, $selectedActivities))
                            <div class="mb-8">
                                <!-- Remaining activity checkbox -->
                                <label for="activity_{{ $activity->id }}" class="text-xl">
                                    <input type="checkbox" id="activity_{{ $activity->id }}" name="activities[]"
                                        value="{{ $activity->id }}">
                                    {{ $activity->activityname }}
                                </label>
                                <!-- Input fields for rates for each activity (wrapped in a div) -->
                                <div class="grid grid-cols-4 gap-10 mx-16 rate-fields hidden">
                                    <div class="grid grid-rows-2">
                                        <label for="rates[{{ $activity->id }}][weekdayhourlyrate]"
                                            class="block mt-5">Weekday Rate</label>
                                        <input type="text" id="rates[{{ $activity->id }}][weekdayhourlyrate]"
                                            name="rates[{{ $activity->id }}][weekdayhourlyrate]"
                                            class="form-input rounded-md shadow-sm block w-full"
                                            value="{{ old('rates.' . $activity->id . '.weekdayhourlyrate', optional($allclient->activityRates->where('activity_id', $activity->id)->first())->weekdayhourlyrate ?? '') }}"
                                            data-activity-id="{{ $activity->id }}">
                                    </div>
                                    <div class="grid grid-rows-2">
                                        <label for="rates[{{ $activity->id }}][saturdayhourlyrate]"
                                            class="block mt-5">Saturday Rate</label>
                                        <input type="text" id="rates[{{ $activity->id }}][saturdayhourlyrate]"
                                            name="rates[{{ $activity->id }}][saturdayhourlyrate]"
                                            class="form-input rounded-md shadow-sm block w-full"
                                            value="{{ old('rates.' . $activity->id . '.saturdayhourlyrate', optional($allclient->activityRates->where('activity_id', $activity->id)->first())->saturdayhourlyrate ?? '') }}">
                                    </div>
                                    <div class="grid grid-rows-2">
                                        <label for="rates[{{ $activity->id }}][sundayhourlyrate]"
                                            class="block mt-5">Sunday Rate</label>
                                        <input type="text" id="rates[{{ $activity->id }}][sundayhourlyrate]"
                                            name="rates[{{ $activity->id }}][sundayhourlyrate]"
                                            class="form-input rounded-md shadow-sm block w-full"
                                            value="{{ old('rates.' . $activity->id . '.sundayhourlyrate', optional($allclient->activityRates->where('activity_id', $activity->id)->first())->sundayhourlyrate ?? '') }}">
                                    </div>
                                    <div class="grid grid-rows-2">
                                        <label for="rates[{{ $activity->id }}][publicholidayhourlyrate]"
                                            class="block mt-5">Public Holiday Rate</label>
                                        <input type="text"
                                            id="rates[{{ $activity->id }}][publicholidayhourlyrate]"
                                            name="rates[{{ $activity->id }}][publicholidayhourlyrate]"
                                            class="form-input rounded-md shadow-sm block w-full"
                                            value="{{ old('rates.' . $activity->id . '.publicholidayhourlyrate', optional($allclient->activityRates->where('activity_id', $activity->id)->first())->publicholidayhourlyrate ?? '') }}">
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <!-- Error message div -->
                    <div id="error-message" class="text-red-500 font-semibold"></div>


                    <script>
                        // Add an event listener to the checkboxes to toggle visibility
                        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
                        checkboxes.forEach(checkbox => {
                            checkbox.addEventListener('change', function() {
                                const rateFields = this.closest('.mb-8').querySelector('.rate-fields');
                                if (this.checked) {
                                    rateFields.style.display = 'grid';
                                } else {
                                    rateFields.style.display = 'none';
                                }
                            });
                        });

                        // JavaScript function to validate the form before submission
                        function validateForm() {
                            // Get all rate input fields
                            const rateFields = document.querySelectorAll('input[name^="rates["]');
                            let isValid = true;

                            rateFields.forEach(field => {
                                const activityId = field.getAttribute('data-activity-id');
                                const checkbox = document.querySelector(`#activity_${activityId}`);

                                if (checkbox && checkbox.checked && field.value === '') {
                                    isValid = false;
                                    document.getElementById('error-message').textContent = 'Please fill in all hourly rates.';
                                    return false; // Stop the loop if any rate field is empty.
                                }
                            });

                            if (!isValid) {
                                return false; // Prevent form submission if validation fails.
                            }
                        }
                    </script>
            </div>
            <div class="flex items-center justify-start py-3 text-right ">
                <button
                    class="inline-flex min-w-full items-center px-6 py-4 bg-green-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-green-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Update Activities
                </button>
            </div>
            </form>

        </div>
    </div>

    <div
        class="flex items-center justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
        <!-- Back to All Clients index page -->
        <a href="{{ route('allclients.show', $allclient) }}"
            class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
            Back
        </a>
    </div>

</x-app-layout>
