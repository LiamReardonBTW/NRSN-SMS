<x-app-layout>
    <x-slot name="header">
        Worker: {{ $manageworker->first_name }} {{ $manageworker->last_name }}

    </x-slot>

    <div class="max-w-screen-2xl px-4 lg:px-8">

        <div class="relative overflow-x-auto bg-blue-200 shadow-xl rounded-lg ">
            <form>
                @csrf

                <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">

                    <!-- First Name -->
                    <div class="mx-4 my-5">
                        <label for="first_name">First
                            Name</label>
                        <x-input disabled type="text" name="first_name" id="first_name"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $manageworker->first_name }}" />
                    </div>

                    <!-- Last Name -->
                    <div class="mx-4 my-5">
                        <label for="last_name">Last Name</label>
                        <x-input disabled type="text" name="last_name" id="last_name"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $manageworker->last_name }}" />
                    </div>

                    <!-- Email -->
                    <div class="mx-4 my-5">
                        <label for="email">Email</label>
                        <x-input disabled type="email" name="email" id="email"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $manageworker->email }}" />
                    </div>
                </div>

                <div class="text-2xl font-medium  overflow-hidden grid grid-cols-1 md:grid-cols-3  px-6 lg:px-8">
                    <!-- ID -->
                    <div class="mx-4 my-5">
                        <label for="client_id">User ID</label>
                        <x-input disabled type="text" name="client_id" id="client_id"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $manageworker->id }}" />
                    </div>
                        <!-- PHONE -->
                    <div class="mx-4 my-5">
                        <label for="phone">Phone</label>
                        <x-input disabled type="text" name="phone" id="phone"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $manageworker->phone }}" />
                    </div>
                        <!-- ADDRESS -->
                    <div class="mx-4 my-5">
                        <label for="address">Address</label>
                        <x-input disabled type="text" name="address" id="address"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $manageworker->address }}" />
                    </div>
                        <!-- TFN -->
                    <div class="mx-4 my-5">
                        <label for="tfn">TFN</label>
                        <x-input disabled type="text" name="tfn" id="tfn"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $manageworker->tfn }}" />
                    </div>

                    <!-- ABN -->
                    <div class="mx-4 my-5">
                        <label for="abn">ABN</label>
                        <x-input disabled type="text" name="abn" id="abn"
                            class="form-input rounded-md shadow-sm block w-full"
                            value="{{ $manageworker->abn }}" />
                    </div>

                    <!-- ROLE -->
                    <div class="mx-4 my-5">
                        <label for="abn">Role</label>
                        <x-input disabled type="text" name="role" id="role"
                            class="form-input rounded-md shadow-sm block w-full"

                            value="{{ $manageworker->role == 0 ? 'Admin' : ($manageworker->role == 1 ?  'Manager': 'Worker') }}"
                          />
                          <!-- value="{{ $manageworker->role }}"  -->
                    </div>


                    <!-- Last Updated -->
                    <div class="mx-4 my-5">
                        <label for="updated_at">Last Updated</label>
                        <x-input disabled type="text" name="updated_at" id="updated_at"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $manageworker->updated_at }}" />
                    </div>

                    <!-- Created_at -->
                    <div class="mx-4 my-5">
                        <label for="created_at">Added</label>
                        <x-input disabled type="text" name="created_at" id="created_at"
                            class="form-input rounded-md shadow-sm block w-full" value="{{ $manageworker->created_at }}" />
                    </div>

                </div>


            </form>
            <div
                class="flex items-center justify-start pb-6 py-5 text-right sm:px-6 grid grid-cols-1 md:grid-cols-3 lg:gap-8 px-6 lg:px-8 py-2">
                <a href="{{  route('manageworkers.index') }}"
                    class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Back
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
