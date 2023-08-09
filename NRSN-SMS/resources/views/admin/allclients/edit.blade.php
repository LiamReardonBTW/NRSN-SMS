<x-app-layout>

    <!-- Page Header Title -->
    <x-slot name="header">
        <!-- Shows selected clients first and last name -->
        {{ __('Edit Client:') }} {{ $allclient->first_name }} {{ $allclient->last_name }}
    </x-slot>

    <!-- Form Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg">

        <!-- Client Information Container -->
        <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">

            <!-- Update Client Information Form -->
            <form method="post" action="{{ route('allclients.update', $allclient) }}">
                @csrf
                @method('PUT')

                <!-- Editable Client Information -->
                <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

                    <!-- First Name -->
                    <div class="mx-4 my-5">
                        <label for="first_name">First
                            Name</label>
                        <x-input type="text" name="first_name" id="first_name"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $allclient->first_name }}" />
                        @error('first_name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Last Name -->
                    <div class="mx-4 my-5">
                        <label for="last_name">Last Name</label>
                        <x-input type="text" name="last_name" id="last_name"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $allclient->last_name }}" />
                        @error('last_name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone # -->
                    <div class="mx-4 my-5">
                        <label for="phone">Phone #</label>
                        <x-input type="string" name="phone" id="phone"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $allclient->phone }}" />
                        @error('phone')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mx-4 my-5">
                        <label for="email">Email</label>
                        <x-input type="email" name="email" id="email"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $allclient->email }}" />
                        @error('email')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="mx-4 my-5">
                        <label for="address">Address</label>
                        <x-input type="text" name="address" id="address"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $allclient->address }}" />
                        @error('address')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Invoicing Codes -->
                    <div class="mx-4 my-5">
                        <label for="invoicing_codes">Invoicing
                            Codes</label>
                        <x-input type="text" name="invoicing_codes" id="invoicing_codes"
                            class="form-input rounded-md shadow-sm block w-full"
                            value="{{ $allclient->invoicing_codes }}" />
                        @error('invoicing_codes')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Active Status -->
                    <div class="mx-4 my-5">
                        <label for="active">Active Status</label>
                        <select name="active" id="active" class="form-select rounded-md shadow-sm block w-full">
                            <option value="1" {{ $allclient->active === '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $allclient->active === 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                </div><!-- Close Editable Information -->

                <!-- Uneditable Client Information -->
                <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">
                    <!-- Client ID -->
                    <div class="mx-4 my-5">
                        <label for="client_id">Client ID</label>
                        <x-input disabled type="text" name="client_id" id="client_id"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $allclient->id }}" />
                    </div>

                    <!-- Added -->
                    <div class="mx-4 my-5">
                        <label for="created_at">Added</label>
                        <x-input disabled type="text" name="created_at" id="created_at"
                            class="form-input rounded-md shadow-sm block w-full"
                            value="{{ $allclient->created_at }}" />
                    </div>

                    <!-- Last Updated -->
                    <div class="mx-4 my-5">
                        <label for="updated_at">Last Updated</label>
                        <x-input disabled type="text" name="updated_at" id="updated_at"
                            class="form-input rounded-md shadow-sm block w-full"
                            value="{{ $allclient->updated_at }}" />
                    </div>

                </div><!-- End Uneditable Client Information -->

                <!-- Page Navigation Buttons  -->
                <div
                    class="flex items-center justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
                    <!-- Back to All Clients index page -->
                    <a href="{{ route('allclients.index') }}"
                        class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Back
                    </a>
                    <!-- Form Submit changes to client Button -->
                    <button
                        class="inline-flex items-center mx-4 px-6 py-4 bg-green-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-green-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Submit
                    </button>
                </div>

            </form> <!-- Close Form -->
        </div> <!-- Close Client Information Container -->

    </div> <!-- Close Form Container -->

</x-app-layout>
