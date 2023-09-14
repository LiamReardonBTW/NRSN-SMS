<x-app-layout>

    <!-- Page Header Title -->
    <x-slot name="header">
        <!-- Shows selected clients first and last name -->
        {{ __('Activity:') }} {{ $activity->activity_name }}
    </x-slot>

    <!-- Form Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">

        <!-- Contract Information Container -->
        <div class="text-2xl font-medium bg-blue-300 overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">
            <!-- Activity Name -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="activityname">Activity</label>
                <x-input disabled type="text" name="activityname" id="activityname"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="{{ $activity->activityname }}" />
            </div>
            <!-- Added Date -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="created_at">Created</label>
                <x-input disabled type="date" name="created_at" id="created_at"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="{{ \Carbon\Carbon::parse($activity->created_at)->format('Y-m-d') }}" />
            </div>
            <!-- Updated Date -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="updated_at">Last Updated</label>
                <x-input disabled type="date" name="updated_at" id="updated_at"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="{{ \Carbon\Carbon::parse($activity->updated_at)->format('Y-m-d') }}" />
            </div>
        </div>
        <div class="text-2xl font-medium bg-blue-200 overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">
            <!-- Weekday Code -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="weekdayhourlycode">Weekday Code</label>
                <x-input disabled type="text" name="weekdayhourlycode" id="weekdayhourlycode"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="{{ $activity->weekdayhourlycode }}" />
            </div>
            <!-- Saturday Code -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="saturdayhourlycode">Saturday Code</label>
                <x-input disabled type="text" name="saturdayhourlycode" id="saturdayhourlycode"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="{{ $activity->saturdayhourlycode }}" />
            </div>
            <!-- Saturday Code -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="sundayhourlycode">Sunday Code</label>
                <x-input disabled type="text" name="sundayhourlycode" id="sundayhourlycode"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="{{ $activity->sundayhourlycode }}" />
            </div>
            <!-- Saturday Code -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="publicholidayhourlycode">Public Holiday Code</label>
                <x-input disabled type="text" name="publicholidayhourlycode" id="publicholidayhourlycode"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="{{ $activity->publicholidayhourlycode }}" />
            </div>
            <!-- Active Status -->
            <div class="mx-4 my-5 grid grid-rows-2">
                <label for="active">Active Status</label>
                <select disabled name="active" id="active" class="form-select rounded-md shadow-sm block w-full">
                    <option value="1" {{ $activity->active === '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $activity->active === 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

        </div>
    </div>

    <!-- Page Navigation Buttons -->
    <div
        class="flex items-center justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
        <!-- Back to manage clients index page -->
        <a href="{{ route('activities.index') }}"
            class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
            Back
        </a>
        <!-- To Edit Contract page -->
        <a href="{{ route('activities.edit', $activity) }}"
            class="inline-flex items-center mx-4 px-6 py-4 bg-blue-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-blue-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
            Edit Contract
        </a>
    </div>
</x-app-layout>
