<x-app-layout>
    <!-- Page Header Title -->
    <x-slot name="header">
        {{ __('Business Details') }}
    </x-slot>

    <!-- Container -->
    <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg">
        <!-- Business Information Container -->
        <h2 class="text-3xl mt-5 font-semibold px-10 lg:px-12">Business Details</h2>
        <div class="text-2xl font-medium overflow-hidden grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 px-6 lg:px-8">

            <!-- Business Name -->
            <div class="mx-4 my-5">
                <label for="name">Business Name</label>
                <x-input disabled type="text" name="name" id="name"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $businessDetails->name }}" />
            </div>

            <!-- Business Address -->
            <div class="mx-4 my-5">
                <label for="address">Business Address</label>
                <x-input disabled type="text" name="address" id="address"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="{{ $businessDetails->address }}" />
            </div>

            <!-- Business Phone -->
            <div class="mx-4 my-5">
                <label for="phone">Business Phone</label>
                <x-input disabled type="text" name="phone" id="phone"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="{{ $businessDetails->phone }}" />
            </div>

            <!-- Business TFN -->
            <div class="mx-4 my-5">
                <label for="tfn">Business TFN</label>
                <x-input disabled type="text" name="tfn" id="tfn"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $businessDetails->tfn }}" />
            </div>

            <!-- Business ABN -->
            <div class="mx-4 my-5">
                <label for="abn">Business ABN</label>
                <x-input disabled type="text" name="abn" id="abn"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $businessDetails->abn }}" />
            </div>
        </div>
        <!-- Bank Details -->
        <h2 class="text-3xl mt-5 font-semibold px-10 lg:px-12">Bank Details</h2>
        <div class="text-2xl font-medium overflow-hidden grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 px-6 lg:px-8">

            <!-- Bank Name -->
            <div class="mx-4 my-5">
                <label for="bankname">Bank Name</label>
                <x-input disabled type="text" name="bankname" id="bankname"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $businessDetails->bankname }}" />
            </div>

            <!-- Bank Address -->
            <div class="mx-4 my-5">
                <label for="bankaddress">Bank Address</label>
                <x-input disabled type="text" name="bankaddress" id="bankaddress"
                    class="form-input rounded-md shadow-sm block w-full" value="{{ $businessDetails->bankaddress }}" />
            </div>

            <!-- Bank Account Number -->
            <div class="mx-4 my-5">
                <label for="bankaccountnumber">Bank Account Number</label>
                <x-input disabled type="text" name="bankaccountnumber" id="bankaccountnumber"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="{{ $businessDetails->bankaccountnumber }}" />
            </div>

            <!-- Bank BSB Number -->
            <div class="mx-4 my-5">
                <label for="bankbsbnumber">Bank BSB Number</label>
                <x-input disabled type="text" name="bankbsbnumber" id="bankbsbnumber"
                    class="form-input rounded-md shadow-sm block w-full"
                    value="{{ $businessDetails->bankbsbnumber }}" />
            </div>
        </div>

        <!-- Page Navigation Button -->
        <div class="flex items-center justify-start pb-6 py-5 text-right sm:px-6 px-6 lg:px-8 py-2">
            <!-- Back to Dashboard -->
            <div>
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Back
                </a>
                <a href="{{ route('business-details.edit', $businessDetails) }}"
                    class="inline-flex items-center mx-4 px-6 py-4 bg-blue-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-blue-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Edit
                </a>
            </div>
        </div><!-- Close Container -->
    </div>
</x-app-layout>
