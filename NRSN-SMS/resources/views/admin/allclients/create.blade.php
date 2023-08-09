<x-app-layout>

    <!-- Page Header Title -->
    <x-slot name="header">
        {{ __('Add Client') }}
    </x-slot>

    <!-- Form Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg">

        <!-- Client Information Container -->
        <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">

            <!-- Update Client Information Form -->
            <form method="post" action="{{ route('allclients.store') }}">
                @csrf

                <!-- Editable Client Information -->
                <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

                    <!-- First Name -->
                    <div class="mx-4 my-2">
                        <label for="first_name">First
                            Name</label>
                        <x-input type="text" name="first_name" id="first_name"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ old('first_name', '') }}" />
                    </div>

                    <!-- Last Name -->
                    <div class="mx-4 my-2">
                        <label for="last_name">Last Name</label>
                        <x-input type="text" name="last_name" id="last_name"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ old('last_name', '') }}" />
                    </div>

                    <!-- Phone # -->
                    <div class="mx-4 my-2">
                        <label for="phone">Phone #</label>
                        <x-input type="string" name="phone" id="phone"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ old('phone', '') }}" />
                    </div>

                    <!-- Email -->
                    <div class="mx-4 my-2">
                        <label for="email">Email</label>
                        <x-input type="email" name="email" id="email"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ old('email', '') }}" />
                    </div>

                    <!-- Address -->
                    <div class="mx-4 my-2">
                        <label for="address">Address</label>
                        <x-input type="text" name="address" id="address"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ old('address', '') }}" />
                    </div>

                    <!-- Invoicing Codes -->
                    <div class="mx-4 my-2">
                        <label for="invoicing_codes">Invoicing
                            Codes</label>
                        <x-input type="text" name="invoicing_codes" id="invoicing_codes"
                            class="form-input rounded-md shadow-sm block w-full"
                            value="{{ old('invoicing_codes', '') }}" />
                    </div>

                    <!-- Active Status -->
                    <div class="mx-4 my-5">
                        <label for="active">Active Status</label>
                        <select name="active" id="active" class="form-select rounded-md shadow-sm block w-full">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                </div><!-- Close Editable Information -->

                <!-- Page Navigation Buttons  -->
                <div
                    class="flex items-center justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
                    <!-- Back to All Clients page -->
                    <a href="{{ route('allclients.index') }}"
                        class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Back
                    </a>
                    <!-- Form Submit client information -->
                    <button
                        class="inline-flex items-center mx-4 px-6 py-4 bg-green-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-green-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Add
                    </button>
                </div>
            </form>
        </div>

    </div><!-- Close Form Container -->

</x-app-layout>
