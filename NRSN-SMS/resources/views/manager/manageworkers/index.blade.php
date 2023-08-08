<x-app-layout>
    <x-slot name="header">
        {{ __('All Workers') }}
    </x-slot>
    <div class="px-4 lg:px-8">
        <div class="relative overflow-auto border-2 border-blue-600 rounded">
            <table class="w-full text-left text-gray-800 bg-gray-100">
                <thead class="text-xs uppercase text-gray-50 bg-blue-800 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            User ID
                        </th>
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2">
                            Role
                        </th>
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                            <div class="flex items-center">
                                First Name
                                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                            <div class="flex items-center">
                                Last Name
                                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                            <div class="flex items-center">
                                Email
                                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                            <div class="flex items-center">
                                Phone
                                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                            <div class="flex items-center">
                                Address
                                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="w-48 text-right px-2 py-1 border-r-2 border-blue-500 border-b-2 ">
                            <span class="mr-28">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="text-xs font-bold">
                    @foreach ($users as $user)
                        <tr class="even:bg-gray-50 odd:bg-gray-200 hover:bg-blue-200 h-12">
                            <td scope="row" class="px-1 py-1 text-center">
                                {{ $user->id }}
                            </td>
                            <td scope="row" class="px-1 py-1">
                                @if ($user->role == '0')
                                    Admin
                                @endif
                                @if ($user->role == '1')
                                    Manager
                                @endif
                                @if ($user->role == '2')
                                    Worker
                                @endif
                            </td>
                            <td scope="row" class="px-1 py-1">
                                {{ $user->first_name }}
                            </td>
                            <td scope="row" class="px-1 py-1">
                                {{ $user->last_name }}
                            </td>
                            <td scope="row" class="px-1 py-1">
                                {{ $user->email }}
                            </td>
                            <td scope="row" class="px-1 py-1">
                                {{ $user->phone }}
                            </td>
                            <td scope="row" class="px-1 py-1">
                                {{ $user->address }}
                            </td>

                            <td class="whitespace-nowrap text-sm text-white font-bold float-right py-3">
                                <a href="{{ route('manageworkers.show', $user->id) }}"
                                    class="inline-block px-2 mx-1 py-1 bg-green-600 rounded hover:shadow-xl hover:bg-green-500">View</a>
                                <a href="{{ route('manageworkers.edit', $user->id) }}"
                                    class="inline-block px-2 mx-1 py-1 bg-blue-600 rounded hover:shadow-xl hover:bg-blue-500">Edit</a>
                                <form class="inline-block" action="{{ route('manageworkers.destroy', $user->id) }}"
                                    method="POST" onsubmit="return confirm('Are you sure?');">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit"
                                        class="px-2 mx-1 py-1 bg-red-600 rounded hover:shadow-xl hover:bg-red-500"
                                        value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>



        </div>
        <div class="block pb-12 pt-12">
            <a href="{{  route('dashboard') }}"
                class="inline-flex items-center mx-4 px-6 py-4 bg-red-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-red-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Back
            </a>
            <a href="{{ route('manageworkers.create') }}"
                class="inline-flex items-center mx-4 px-6 py-4 bg-green-700 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-green-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Add User </a>
            </a>
        </div>
    </div>
</x-app-layout>
