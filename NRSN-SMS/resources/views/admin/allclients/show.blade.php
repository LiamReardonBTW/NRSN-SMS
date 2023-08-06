<x-app-layout>
    <x-slot name="header">
        Client: {{ $selectedClient->first_name }} {{ $selectedClient->last_name }}

    </x-slot>

    <div class="max-w-screen-2xl px-4 lg:px-8">

        <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">
            <form>
                @csrf

                <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">
                    <div class="mx-4 my-2">
                        <label for="first_name">First
                            Name</label>
                        <x-input disabled type="text" name="first_name" id="first_name"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $selectedClient->first_name }}" />
                        @error('first_name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mx-4 my-2">
                        <label for="last_name">Last Name</label>
                        <x-input disabled type="text" name="last_name" id="last_name"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $selectedClient->last_name }}" />
                        @error('last_name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mx-4 my-2">
                        <label for="phone">Phone #</label>
                        <x-input disabled type="string" name="phone" id="phone"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $selectedClient->phone }}" />
                        @error('phone')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mx-4 my-2">
                        <label for="email">Email</label>
                        <x-input disabled type="email" name="email" id="email"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $selectedClient->email }}" />
                        @error('email')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mx-4 my-2">
                        <label for="address">Address</label>
                        <x-input disabled type="text" name="address" id="address"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $selectedClient->address }}" />
                        @error('address')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mx-4 my-2">
                        <label for="invoicing_codes">Invoicing
                            Codes</label>
                        <x-input disabled type="text" name="invoicing_codes" id="invoicing_codes"
                            class="form-input rounded-md shadow-sm block w-full"
                            value="{{ $selectedClient->invoicing_codes }}" />
                        @error('invoicing_codes')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

            </form>
            <div class="flex items-center justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
                <a href="{{ route('allclients.index') }}" class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Back
                </a>
        </div>
    </div>
</x-app-layout>
