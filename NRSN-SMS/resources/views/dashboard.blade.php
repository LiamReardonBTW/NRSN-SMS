<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="px-6 lg:px-8 pb-6">
        <h1 class="text-2xl font-medium text-gray-900">
            Welcome <span class="text-green-600 font-bold">{{ Auth::user()->first_name }}</span>!
        </h1>

        <p class="mt-2 text-gray-500 leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor consectetur diam, quis
            accumsan sem lobortis ut. Fusce quis ligula imperdiet tellus tincidunt malesuada eu sollicitudin
            est. Etiam accumsan volutpat volutpat. Ut aliquam molestie dictum. Pellentesque orci urna,
            sagittis et lobortis ut, fermentum nec dui. Aliquam bibendum ipsum turpis, sed pharetra ipsum
            eleifend quis. Nulla quis leo bibendum, ultricies dui nec, varius quam. Sed cursus tincidunt
            finibus.
        </p>
    </div>

    {{-- Worker Dash Content --}}
    <h1 class="text-2xl text-blue-500 font-bold mx-8 mt-5">Worker</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 px-6 lg:px-8 py-2">

        {{-- Placeholder Card --}}
        <a class="bg-blue-400 p-5 rounded-2xl hover:bg-blue-300" href="#">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    class="w-6 h-6 stroke-black">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
                <h2 class="ml-3 text-xl font-semibold">Placeholder</h2>
            </div>

            <p class="mt-2 font-bold text-l leading-relaxed text-left">
                Placeholder: <br><br><br>
            </p>

        </a>

        {{-- Placeholder Card --}}
        <a class="bg-blue-400 p-5 rounded-2xl hover:bg-blue-300" href="#">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    class="w-6 h-6 stroke-black">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
                <h2 class="ml-3 text-xl font-semibold">Placeholder</h2>
            </div>

            <p class="mt-2 font-bold text-l leading-relaxed text-left">
                Placeholder: <br><br><br>
            </p>
        </a>
    </div>


    {{-- Manager Dash Content --}}
    <h1 class="text-2xl text-orange-500 font-bold mx-8 mt-5">Manager</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 px-6 lg:px-8 py-2">


        {{-- Placeholder Card --}}
        <a class="bg-orange-400 p-5 rounded-2xl hover:bg-orange-300" href="#">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    class="w-6 h-6 stroke-black">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
                <h2 class="ml-3 font-semibold text-xl">Placeholder</h2>
            </div>

            <p class="mt-2 font-bold text-l leading-relaxed text-left">
                Placeholder: <br><br><br>
            </p>
        </a>

        <a class="bg-orange-400 p-5 rounded-2xl hover:bg-orange-300" href="#">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    class="w-6 h-6 stroke-black">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
                <h2 class="ml-3 font-semibold text-xl">Placeholder</h2>
            </div>

            <p class="mt-2 font-bold text-l leading-relaxed text-left">
                Placeholder: <br><br><br>
            </p>
        </a>

        <a class="bg-orange-400 p-5 rounded-2xl hover:bg-orange-300" href="#">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    class="w-6 h-6 stroke-black">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
                <h2 class="ml-3 font-semibold text-xl">Placeholder</h2>
            </div>

            <p class="mt-2 font-bold text-l leading-relaxed text-left">
                Placeholder: <br><br><br>
            </p>
        </a>

    </div>


    {{-- Admin Dash Content --}}
    <div>
        <h1 class="text-2xl text-red-500 font-bold mx-8 mt-5">Admin</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 px-6 lg:px-8 py-2">

            {{-- Admin All Clients Card --}}
            <a class="bg-red-400 p-5 rounded-2xl hover:bg-red-300" href="{{ route('clients.index') }}">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        class="w-6 h-6 stroke-black">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                    <h2 class="ml-3 font-semibold text-xl">All Clients</h2>
                </div>

                <p class="mt-2 text-l font-bold leading-relaxed text-left">
                    Active: <br>Inactive: <br>Total:
                </p>
            </a>
        </div>
    </div>
</x-app-layout>
