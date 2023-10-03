<x-app-layout>
    <!-- Page Header Title -->
    <x-slot name="header">
        {{ __('Business Details') }}
    </x-slot>

    <!-- Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg">
        <!-- Business Information Container -->
        <form method="POST" action="{{ route('business-details.update', $businessDetails->id) }}">
            @csrf
            @method('PUT')
            <h2 class="text-3xl mt-5 font-semibold px-10 lg:px-12">Business Details</h2>
            <div
                class="text-2xl font-medium overflow-hidden grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 px-6 lg:px-8">

                <!-- Business Name -->
                <div class="mx-4 my-5">
                    <label for="name">Business Name</label>
                    <x-input type="text" name="name" id="name"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $businessDetails->name }}" />
                    @error('name')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Business Address -->
                <div class="mx-4 my-5">
                    <label for="address">Business Address</label>
                    <x-input type="text" name="address" id="address"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $businessDetails->address }}" />
                    @error('address')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Business Phone -->
                <div class="mx-4 my-5">
                    <label for="phone">Business Phone</label>
                    <x-input type="text" name="phone" id="phone"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $businessDetails->phone }}" />
                    @error('phone')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Business TFN -->
                <div class="mx-4 my-5">
                    <label for="tfn">Business TFN</label>
                    <x-input type="text" name="tfn" id="tfn"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $businessDetails->tfn }}" />
                    @error('tfn')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Business ABN -->
                <div class="mx-4 my-5">
                    <label for="abn">Business ABN</label>
                    <x-input type="text" name="abn" id="abn"
                        class="form-input rounded-md shadow-sm block w-full" value="{{ $businessDetails->abn }}" />
                    @error('abn')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <!-- Bank Details -->
            <h2 class="text-3xl mt-5 font-semibold px-10 lg:px-12">Bank Details</h2>
            <div
                class="text-2xl font-medium overflow-hidden grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 px-6 lg:px-8">

                <!-- Bank Name -->
                <div class="mx-4 my-5">
                    <label for="bankname">Bank Name</label>
                    <x-input type="text" name="bankname" id="bankname"
                        class="form-input rounded-md shadow-sm block w-full"
                        value="{{ $businessDetails->bankname }}" />
                    @error('bankname')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bank Address -->
                <div class="mx-4 my-5">
                    <label for="bankaddress">Bank Address</label>
                    <x-input type="text" name="bankaddress" id="bankaddress"
                        class="form-input rounded-md shadow-sm block w-full"
                        value="{{ $businessDetails->bankaddress }}" />
                    @error('bankaddress')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bank Account Number -->
                <div class="mx-4 my-5">
                    <label for="bankaccountnumber">Bank Account Number</label>
                    <x-input type="text" name="bankaccountnumber" id="bankaccountnumber"
                        class="form-input rounded-md shadow-sm block w-full"
                        value="{{ $businessDetails->bankaccountnumber }}" />
                    @error('bankaccountnumber')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bank BSB Number -->
                <div class="mx-4 my-5">
                    <label for="bankbsbnumber">Bank BSB Number</label>
                    <x-input type="text" name="bankbsbnumber" id="bankbsbnumber"
                        class="form-input rounded-md shadow-sm block w-full"
                        value="{{ $businessDetails->bankbsbnumber }}" />
                    @error('bankbsbnumber')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Page Navigation Buttons -->
            <div
                class="items-center grid grid-cols-1 gap-4 justify-start pb-6 py-3 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
                <!-- Back to All Users index page -->
                <a href="{{ route('business-details.index') }}"
                    class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Back
                </a>
                <!-- Form Submit changes to user Button -->
                <button
                    class="inline-flex items-center mx-4 px-6 py-4 bg-green-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-green-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Submit
                </button>
            </div>
        </form>
    </div><!-- Close Container -->
</x-app-layout>
