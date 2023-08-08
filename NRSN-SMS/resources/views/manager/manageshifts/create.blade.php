<x-app-layout>
    <x-slot name="header">
        Add Shift:
    </x-slot>

    <div class="max-w-screen-2xl px-4 lg:px-8">

        <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">
            <form method="post" action="{{ route('manageshifts.store') }}">
                @csrf

                <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

                    <!-- First Name -->
                    <div class="mx-4 my-5">
                        <label for="id">Shift ID</label>
                        <x-input disabled type="text" name="id" id="id"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ old('id', '') }}" />
                    </div>

                    <!-- Last Name -->
                    <div class="mx-4 my-5">
                        <label for="created_at">Date/Time</label>
                        <x-input disabled type="timestamp" name="created_at" id="created_at"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ old('created_at', '') }}" />
                    </div>

                    <!-- Phone # -->
                    <div class="mx-4 my-5">
                        <label for="submitted_by">By</label>
                        <x-input type="string" name="submitted_by" id="submitted_by"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ old('submitted_by', '') }}" />
                    </div>

                </div>
                <div
                    class="flex items-center justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
                    <a href="{{ route('dashboard') }}"
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
