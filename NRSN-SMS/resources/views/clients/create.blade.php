<x-app-layout>
    <x-slot name="header">
        {{ __('Clients') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-50 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <h2 class="px-5 py-3 font-semibold text-3xl leading-tight text-gray-700">Add Client</h2>
                    <form method="post" action="{{ route('clients.store') }}">
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 sm:p-6">
                                <label for="first_name" class="block font-medium text-sm text-gray-700">First
                                    Name</label>
                                <x-input type="text" name="first_name" id="first_name"
                                    class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('first_name', '') }}" />
                                @error('first_name')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-5 sm:p-6">
                                <label for="last_name" class="block font-medium text-sm text-gray-700">Last Name</label>
                                <x-input type="text" name="last_name" id="last_name"
                                    class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('last_name', '') }}" />
                                @error('last_name')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-5 sm:p-6">
                                <label for="phone" class="block font-medium text-sm text-gray-700">Phone #</label>
                                <x-input type="string" name="phone" id="phone"
                                    class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('phone', '') }}" />
                                @error('phone')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-5 sm:p-6">
                                <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                                <x-input type="email" name="email" id="email"
                                    class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('email', '') }}" />
                                @error('email')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-5 sm:p-6">
                                <label for="address" class="block font-medium text-sm text-gray-700">Address</label>
                                <x-input type="text" name="address" id="address"
                                    class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('address', '') }}" />
                                @error('address')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-5 sm:p-6">
                                <label for="invoicing_codes" class="block font-medium text-sm text-gray-700">Invoicing
                                    Codes</label>
                                <x-input type="text" name="invoicing_codes" id="invoicing_codes"
                                    class="form-input rounded-md shadow-sm mt-1 block w-full"
                                    value="{{ old('invoicing_codes', '') }}" />
                                @error('invoicing_codes')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
                                <button
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
