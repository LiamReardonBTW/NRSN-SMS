<x-app-layout>
    <x-slot name="header">
        {{ __('Add Client') }}
    </x-slot>

    <div class="max-w-screen-2xl px-4 lg:px-8">

        <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">
            <form method="post" action="{{ route('allclients.store') }}">
                @csrf

                <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">
                    <div class="mx-4 my-2">
                        <label for="first_name">First
                            Name</label>
                        <x-input type="text" name="first_name" id="first_name"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ old('first_name', '') }}" />
                    </div>

                    <div class="mx-4 my-2">
                        <label for="last_name">Last Name</label>
                        <x-input type="text" name="last_name" id="last_name"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ old('last_name', '') }}" />
                    </div>

                    <div class="mx-4 my-2">
                        <label for="phone">Phone #</label>
                        <x-input type="string" name="phone" id="phone"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ old('phone', '') }}" />
                    </div>

                    <div class="mx-4 my-2">
                        <label for="email">Email</label>
                        <x-input type="email" name="email" id="email"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ old('email', '') }}" />
                    </div>

                    <div class="mx-4 my-2">
                        <label for="address">Address</label>
                        <x-input type="text" name="address" id="address"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ old('address', '') }}" />
                    </div>

                    <div class="mx-4 my-2">
                        <label for="invoicing_codes">Invoicing
                            Codes</label>
                        <x-input type="text" name="invoicing_codes" id="invoicing_codes"
                            class="form-input rounded-md shadow-sm block w-full"
                            value="{{ old('invoicing_codes', '') }}" />
                    </div>

                    <div class="mx-4 my-5">
                        <label for="active">Active Status</label>
                        <select name="active" id="active"
                            class="form-select rounded-md shadow-sm block w-full">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>

                </div>
                <div
                    class="flex items-center justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
                    <a href="{{  route('allclients.index') }}"
                        class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Back
                    </a>
                    <button
                        class="inline-flex items-center mx-4 px-6 py-4 bg-gray-800 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
