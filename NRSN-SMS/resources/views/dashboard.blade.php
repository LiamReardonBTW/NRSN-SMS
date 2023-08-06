<x-app-layout>
    <x-slot name="header">
        Welcome <span class="text-green-600 font-bold">{{ Auth::user()->first_name }}</span>!
    </x-slot>

    {{-- Placeholder to-do list --}}
    <h1 class="ml-8 mb-8 text-red-600 text-xl font-bold">
        NEXT:
        <br>- ADMIN:'ALL CLIENTS'(SHOW, EDIT, DELETE)
        <br>- ROLES (LARAVEL DAILY VIDEO)
        <br>- ADMIN: 'ALL USERS' PAGE AND FUNCTIONALITY
        <br>- ADMIN: 'ALL SHIFTS' PAGE AND FUNCTIONALITY
        <br>- WORKER: 'SHIFTS' PAGE AND FUNCTIONALITY
        <br>- MANAGER: 'SHIFT MANAGEMENT' PAGE AND FUNCTIONALITY
        <br>- MANAGER: 'WORKER MANAGEMENT' PAGE AND FUNCTIONALITY
    </h1>

    {{-- Worker Dash Content --}}
    <h1 class="text-2xl text-blue-500 font-bold mx-4">Worker</h1>
    <div
        class="grid px-4 pt-4 lg:grid-cols-6 md:grid-cols-4 sm:grid-cols-3 grid-cols-2 lg:gap-6 md:gap-6 sm:gap-s-6 gap-4">

        <!-- WORKER CARD PLACEHOLDERS -->
        @component('components.dashboardcard')
            @slot('requiredrole')
                worker
            @endslot
            @slot('route')
                #
            @endslot
            @slot('title')
                Placeholder Card
            @endslot
            @slot('description')
                Tag
            @endslot
        @endcomponent

        @component('components.dashboardcard')
            @slot('requiredrole')
                worker
            @endslot
            @slot('route')
                #
            @endslot
            @slot('title')
                Placeholder Card
            @endslot
            @slot('description')
                Tag
            @endslot
        @endcomponent

        @component('components.dashboardcard')
            @slot('requiredrole')
                worker
            @endslot
            @slot('route')
                #
            @endslot
            @slot('title')
                Placeholder Card
            @endslot
            @slot('description')
                Tag
            @endslot
        @endcomponent

        @component('components.dashboardcard')
            @slot('requiredrole')
                worker
            @endslot
            @slot('route')
                #
            @endslot
            @slot('title')
                Placeholder Card
            @endslot
            @slot('description')
                Tag
            @endslot
        @endcomponent

        @component('components.dashboardcard')
            @slot('requiredrole')
                worker
            @endslot
            @slot('route')
                #
            @endslot
            @slot('title')
                Placeholder Card
            @endslot
            @slot('description')
                Tag
            @endslot
        @endcomponent

    </div>

    {{-- Manager Dash Content --}}
    <h1 class="text-2xl text-orange-500 font-bold mx-4 mt-5">Manager</h1>
    <div
        class="grid px-4 pt-4 lg:grid-cols-6 md:grid-cols-4 sm:grid-cols-3 grid-cols-2 lg:gap-6 md:gap-6 sm:gap-s-6 gap-4">

        <!-- PLACEHOLDER MANAGER CARD -->
        @component('components.dashboardcard')
            @slot('requiredrole')
                manager
            @endslot
            @slot('route')
                #
            @endslot
            @slot('title')
                Placeholder Card
            @endslot
            @slot('description')
                Tag
            @endslot
        @endcomponent

        @component('components.dashboardcard')
            @slot('requiredrole')
                manager
            @endslot
            @slot('route')
                #
            @endslot
            @slot('title')
                Placeholder Card
            @endslot
            @slot('description')
                Tag
            @endslot
        @endcomponent

        @component('components.dashboardcard')
            @slot('requiredrole')
                manager
            @endslot
            @slot('route')
                #
            @endslot
            @slot('title')
                Placeholder Card
            @endslot
            @slot('description')
                Tag
            @endslot
        @endcomponent
    </div>

    {{-- Admin Dash Content --}}
    <h1 class="text-2xl text-red-500 font-bold mx-4 mt-5">Admin</h1>
    <div
        class="grid px-4 pt-4 lg:grid-cols-6 md:grid-cols-4 sm:grid-cols-3 grid-cols-2 lg:gap-6 md:gap-6 sm:gap-s-6 gap-4 pb-6">

        {{-- Admin All Clients Card --}}
        @component('components.dashboardcard')
            @slot('requiredrole')
                admin
            @endslot
            @slot('route')
                {{ route('allclients.index') }}
            @endslot
            @slot('title')
                <svg class="mx-2 float-left h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                All Clients
            @endslot
            @slot('description')
                View All Clients
            @endslot
        @endcomponent

        <!-- PLACEHOLDER ADMIN CARD -->
        @component('components.dashboardcard')
            @slot('requiredrole')
                admin
            @endslot
            @slot('route')
                #
            @endslot
            @slot('title')
                Placeholder Card
            @endslot
            @slot('description')
                Tag
            @endslot
        @endcomponent

        @component('components.dashboardcard')
            @slot('requiredrole')
                admin
            @endslot
            @slot('route')
                #
            @endslot
            @slot('title')
                Placeholder Card
            @endslot
            @slot('description')
                Tag
            @endslot
        @endcomponent
    </div>
</x-app-layout>
