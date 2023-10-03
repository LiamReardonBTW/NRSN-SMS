<x-app-layout>

    <!-- Page Header Title -->
    <x-slot name="header">
        {{ __('Add User') }}
    </x-slot>

    <!-- Form Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">

        <!-- Add User Information Form -->
        <form method="post" action="{{ route('allusers.store') }}">
            @csrf

            <h1 class="mt-6 mx-10 lg:mx-12">Login information</h1>
            <!-- User Information container -->
            <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

                <!-- Email -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                    <label for="email">Email</label>
                    <x-input type="email" name="email" id="email"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ old('email', '') }}" />
                    @error('email')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                    <label for="password">Password</label>
                    <x-input type="string" name="password" id="password"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ old('password', '') }}" />
                    @error('password')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-select rounded-md shadow-sm block w-full">
                        <option value="0">Admin</option>
                        <option value="1">Manager</option>
                        <option value="2" selected>Worker</option>
                    </select>
                    @error('role')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div><!-- Close User Information container -->

            <h1 class="mt-6 mx-10 lg:mx-12">Personal information</h1>
            <!-- Personal Information container -->
            <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

                <!-- First Name -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                    <label for="first_name">First
                        Name</label>
                    <x-input type="text" name="first_name" id="first_name"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ old('first_name', '') }}" />
                    @error('first_name')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Last Name -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                    <label for="last_name">Last Name</label>
                    <x-input type="text" name="last_name" id="last_name"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ old('last_name', '') }}" />
                    @error('last_name')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                    <label for="phone">Phone</label>
                    <x-input type="string" name="phone" id="phone"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ old('phone', '') }}" />
                    @error('phone')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                    <label for="address">Address</label>
                    <x-input type="string" name="address" id="address"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ old('address', '') }}" />
                    @error('address')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>


                <!-- TFN -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                    <label for="tfn">Tax File Number (TFN)</label>
                    <x-input type="string" name="tfn" id="tfn"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ old('tfn', '') }}" />
                    @error('tfn')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- ABN -->
                <div class="mx-4 mt-5 grid grid-rows-3">
                    <label for="abn">ABN</label>
                    <x-input type="string" name="abn" id="abn"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ old('abn', '') }}" />
                    @error('abn')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div><!-- Close personal information container -->

            <!-- Page Navigation Buttons -->
            <div
                class="items-center grid grid-cols-1 gap-4 justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
                <!-- Back to All Users index page -->
                <a href="{{ route('allusers.index') }}"
                    class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Back
                </a>
                <!-- Form Submit add user -->
                <button
                    class="inline-flex items-center mx-4 px-6 py-4 bg-green-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Create
                </button>
            </div>

        </form>
    </div><!-- Close Form Container -->

</x-app-layout>
