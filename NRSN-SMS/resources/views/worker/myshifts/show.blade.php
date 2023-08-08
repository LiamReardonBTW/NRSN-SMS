<x-app-layout>
    <x-slot name="header">
        Shift ID: {{ $myshift->id }}

    </x-slot>

    <div class="max-w-screen-2xl px-4 lg:px-8">

        <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">
            <form>
                @csrf

                <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

                    <!-- Shift ID -->
                    <div class="mx-4 my-5">
                        <label for="shift_id">Shift ID</label>
                        <x-input disabled type="text" name="shift_id" id="shift_id"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $myshift->id }}" />
                    </div>

                    <!-- Added -->
                    <div class="mx-4 my-5">
                        <label for="created_at">Added</label>
                        <x-input disabled type="text" name="created_at" id="created_at"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $myshift->created_at }}" />
                    </div>

                    <!-- Submitted By -->
                    <div class="mx-4 my-5">
                        <label for="submitted_by">Submitted by</label>
                        <x-input disabled type="text" name="submitted_by" id="submitted_by"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $myshift->submitted_by }}" />
                    </div>
                </div>

            </form>
            <div
                class="flex items-center justify-start pb-6 py-5 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
                <a href="{{  route('myshifts.index') }}"
                    class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Back
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
