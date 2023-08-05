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
