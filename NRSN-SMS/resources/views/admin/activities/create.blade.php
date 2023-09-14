<x-app-layout>

    <!-- Page Header Title -->
    <x-slot name="header">
        <!-- Shows selected clients first and last name -->
        {{ __('Add Activity:') }}
    </x-slot>

    <!-- Form Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">

        <form method="post" action="{{ route('activities.store') }}">
            @csrf

            <!-- Contract Information Container -->
            <div class="text-2xl font-medium bg-blue-300 overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">
                <!-- Activity Name -->
                <div class="mx-4 my-5 grid grid-rows-2">
                    <label for="activityname">Activity</label>
                    <x-input type="text" name="activityname" id="activityname"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ old('activityname') }}" />
                    @error('activityname')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="text-2xl font-medium bg-blue-200 overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

                <!-- Weekday Code -->
                <div class="mx-4 my-5 grid grid-rows-2">
                    <label for="weekdayhourlycode">Weekday Code</label>
                    <x-input type="text" name="weekdayhourlycode" id="weekdayhourlycode"
                        class="form-input rounded-md shadow-sm block w-full"
                        value="{{ old('weekdayhourlycode') }}" />
                    @error('weekdayhourlycode')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Saturday Code -->
                <div class="mx-4 my-5 grid grid-rows-2">
                    <label for="saturdayhourlycode">Saturday Code</label>
                    <x-input type="text" name="saturdayhourlycode" id="saturdayhourlycode"
                        class="form-input rounded-md shadow-sm block w-full"
                        value="{{ old('saturdayhourlycode') }}" />
                    @error('saturdayhourlycode')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Sunday Code -->
                <div class="mx-4 my-5 grid grid-rows-2">
                    <label for="sundayhourlycode">Sunday Code</label>
                    <x-input type="text" name="sundayhourlycode" id="sundayhourlycode"
                        class="form-input rounded-md shadow-sm block w-full"
                        value="{{ old('sundayhourlycode') }}" />
                    @error('sundayhourlycode')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Public Holiday Code -->
                <div class="mx-4 my-5 grid grid-rows-2">
                    <label for="publicholidayhourlycode">Public Holiday Code</label>
                    <x-input type="text" name="publicholidayhourlycode" id="publicholidayhourlycode"
                        class="form-input rounded-md shadow-sm block w-full"
                        value="{{ old('publicholidayhourlycode') }}" />
                    @error('publicholidayhourlycode')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Active Status -->
                <div class="mx-4 my-5 grid grid-rows-2">
                    <label for="active">Active Status</label>
                    <select name="active" id="active" class="form-select rounded-md shadow-sm block w-full">
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    @error('active')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Page Navigation Buttons -->
                <div
                    class="flex items-center justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
                    <!-- Back to manage clients index page -->
                    <a href="{{ route('activities.index') }}"
                        class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Back
                    </a>
                    <!-- Form Submit changes to activity Button -->
                    <button
                        class="inline-flex items-center mx-4 px-6 py-4 bg-green-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-green-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Submit
                    </button>
                </div>
            </div>
    </div>

</x-app-layout>
