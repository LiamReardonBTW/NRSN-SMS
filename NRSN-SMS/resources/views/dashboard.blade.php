<x-app-layout>
    <x-slot name="header">
        Welcome <span class="text-green-600 font-bold">{{ Auth::user()->first_name }}</span>!
    </x-slot>

    {{-- Worker Dash Content --}}
    @if (Auth::User()->role == 0 || Auth::User()->role == 1 || Auth::User()->role == 2) {{-- Check if user is worker, manager, or admin, when displaying content --}}
        <h1 class="text-2xl text-blue-500 font-bold mx-4">Worker</h1>
        <div
            class="grid px-4 pt-4 lg:grid-cols-6 md:grid-cols-4 sm:grid-cols-3 grid-cols-2 lg:gap-6 md:gap-6 sm:gap-s-6 gap-4">

            <!-- WORKER CARD PLACEHOLDERS -->
            @component('components.dashboardcard')
                @slot('requiredrole')
                    worker
                @endslot
                @slot('route')
                    {{ route('myclients.index') }}
                @endslot
                @slot('title')
                    <svg class="inline-block mx-auto h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg><br>
                    My Clients
                @endslot
                @slot('description')
                    View My Clients
                @endslot
            @endcomponent

            @component('components.dashboardcard')
                @slot('requiredrole')
                    worker
                @endslot
                @slot('route')
                    {{ route('myshifts.index') }}
                @endslot
                @slot('title')
                    <svg class="inline-block mx-auto h-6 w-6 text-black" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <circle cx="7" cy="5" r="2" />
                        <path d="M5 22v-5l-1-1v-4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4l-1 1v5" />
                        <circle cx="17" cy="5" r="2" />
                        <path d="M15 22v-4h-2l2 -6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1l2 6h-2v4" />
                    </svg><br>
                    My Shifts
                @endslot
                @slot('description')
                    View My Shifts
                @endslot
            @endcomponent

            @component('components.dashboardcard')
                @slot('requiredrole')
                    worker
                @endslot
                @slot('route')
                    {{ route('myinvoices.index') }}
                @endslot
                @slot('title')
                    <svg class="inline-block mx-auto h-6 w-6 text-black" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <circle cx="7" cy="5" r="2" />
                        <path d="M5 22v-5l-1-1v-4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4l-1 1v5" />
                        <circle cx="17" cy="5" r="2" />
                        <path d="M15 22v-4h-2l2 -6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1l2 6h-2v4" />
                    </svg><br>
                    My Invoices
                @endslot
                @slot('description')
                    View My Invoices
                @endslot
            @endcomponent

        </div>
    @endif

    {{-- Manager Dash Content --}}
    @if (Auth::User()->role == 1 || Auth::User()->role == 0) {{-- Check if user is manager when displaying content --}}
        <h1 class="text-2xl text-orange-500 font-bold mx-4 mt-5">Manager</h1>
        <div
            class="grid px-4 pt-4 lg:grid-cols-6 md:grid-cols-4 sm:grid-cols-3 grid-cols-2 lg:gap-6 md:gap-6 sm:gap-s-6 gap-4">

            <!-- PLACEHOLDER MANAGER CARD -->
            @component('components.dashboardcard')
                @slot('requiredrole')
                    manager
                @endslot
                @slot('route')
                    {{ route('manageclients.index') }}
                @endslot
                @slot('title')
                    <svg class="inline-block mx-auto h-6 w-6 text-black" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg><br>
                    MANAGE CLIENTS
                @endslot
                @slot('description')
                    View All Clients
                @endslot
            @endcomponent

            @component('components.dashboardcard')
                @slot('requiredrole')
                    manager
                @endslot
                @slot('route')
                    {{ route('manageshifts.index') }}
                @endslot
                @slot('title')
                    <svg class="inline-block mx-auto h-6 w-6 text-black" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <circle cx="7" cy="5" r="2" />
                        <path d="M5 22v-5l-1-1v-4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4l-1 1v5" />
                        <circle cx="17" cy="5" r="2" />
                        <path d="M15 22v-4h-2l2 -6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1l2 6h-2v4" />
                    </svg><br>
                    MANAGE SHIFTS
                @endslot
                @slot('description')
                    View All Shifts
                @endslot
            @endcomponent

            @component('components.dashboardcard')
                @slot('requiredrole')
                    manager
                @endslot
                @slot('route')
                    {{ route('manageworkers.index') }}
                @endslot
                @slot('title')
                    <svg class="inline-block mx-auto h-6 w-6 text-black" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <path d="M4 19h5v-1a7.35 7.35 0 1 1 6 0v1h5" />
                    </svg>
                    <br>
                    MANAGE WORKERS
                @endslot
                @slot('description')
                    View All Workers
                @endslot
            @endcomponent

            @component('components.dashboardcard')
                @slot('requiredrole')
                    manager
                @endslot
                @slot('route')
                    {{ route('clientinvoices.index') }}
                @endslot
                @slot('title')
                    <svg class="inline-block mx-auto h-6 w-6 text-black" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <path d="M4 19h5v-1a7.35 7.35 0 1 1 6 0v1h5" />
                    </svg>
                    <br>
                    Client Invoices
                @endslot
                @slot('description')
                    View Client Invoices
                @endslot
            @endcomponent


        </div>
    @endif

    {{-- Admin Dash Content --}}
    @if (Auth::User()->role == 0) {{-- Check if user is admin when displaying content --}}
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
                    <svg class="inline-block mx-auto h-6 w-6 text-black" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <rect x="4" y="4" width="16" height="16" rx="2" />
                        <line x1="4.6" y1="19.4" x2="19.4" y2="4.6" />
                        <path d="M7 9h4m-2 -2v4" />
                        <path d="M13 16h4" />
                    </svg><br>
                    All Clients
                @endslot
                @slot('description')
                    View All Clients
                @endslot
            @endcomponent

            @component('components.dashboardcard')
                @slot('requiredrole')
                    admin
                @endslot
                @slot('route')
                    {{ route('allshifts.index') }}
                @endslot
                @slot('title')
                    <svg class="inline-block mx-auto h-6 w-6 text-black" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <rect x="4" y="4" width="16" height="16" rx="2" />
                        <line x1="4.6" y1="19.4" x2="19.4" y2="4.6" />
                        <path d="M7 9h4m-2 -2v4" />
                        <path d="M13 16h4" />
                    </svg><br>
                    All Shifts
                @endslot
                @slot('description')
                    View All Shifts
                @endslot
            @endcomponent

            <!-- Admin All Users Card -->
            @component('components.dashboardcard')
                @slot('requiredrole')
                    admin
                @endslot
                @slot('route')
                    {{ route('allusers.index') }}
                @endslot
                @slot('title')
                    <svg class="inline-block mx-auto h-6 w-6 text-black" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <rect x="4" y="4" width="16" height="16" rx="2" />
                        <line x1="4.6" y1="19.4" x2="19.4" y2="4.6" />
                        <path d="M7 9h4m-2 -2v4" />
                        <path d="M13 16h4" />
                    </svg><br>
                    All Users
                @endslot
                @slot('description')
                    View All Users
                @endslot
            @endcomponent

            <!-- Admin All Invoices Card -->
            @component('components.dashboardcard')
                @slot('requiredrole')
                    admin
                @endslot
                @slot('route')
                    {{ route('allinvoices.index') }}
                @endslot
                @slot('title')
                    <svg class="inline-block mx-auto h-6 w-6 text-black" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                    </svg><br>
                    All Invoices
                @endslot
                @slot('description')
                    View All Invoices
                @endslot
            @endcomponent

            <!-- Admin Invoices Card -->
            @component('components.dashboardcard')
                @slot('requiredrole')
                    admin
                @endslot
                @slot('route')
                    {{ route('invoicing.index') }}
                @endslot
                @slot('title')
                    <svg class="inline-block mx-auto h-6 w-6 text-black" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                    </svg><br>
                    Invoicing
                @endslot
                @slot('description')
                    Generate & Manage Invoices
                @endslot
            @endcomponent

            <!-- Admin Client Contracts Card -->
            @component('components.dashboardcard')
                @slot('requiredrole')
                    admin
                @endslot
                @slot('route')
                    {{ route('clientcontracts.index') }}
                @endslot
                @slot('title')
                    <svg class="inline-block mx-auto h-6 w-6 text-black" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                    </svg><br>
                    Client Contracts
                @endslot
                @slot('description')
                    View All Client Contracts
                @endslot
            @endcomponent

            <!-- Admin User Contracts Card -->
            @component('components.dashboardcard')
                @slot('requiredrole')
                    admin
                @endslot
                @slot('route')
                    {{ route('usercontracts.index') }}
                @endslot
                @slot('title')
                    <svg class="inline-block mx-auto h-6 w-6 text-black" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                    </svg><br>
                    User Contracts
                @endslot
                @slot('description')
                    View All User Contracts
                @endslot
            @endcomponent

            <!-- Admin Activities Card -->
            @component('components.dashboardcard')
                @slot('requiredrole')
                    admin
                @endslot
                @slot('route')
                    {{ route('activities.index') }}
                @endslot
                @slot('title')
                    <svg class="inline-block mx-auto h-6 w-6 text-black" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                    </svg><br>
                    Activities
                @endslot
                @slot('description')
                    View All Activities
                @endslot
            @endcomponent

            <!-- Admin Invoices Card -->
            @component('components.dashboardcard')
                @slot('requiredrole')
                    admin
                @endslot
                @slot('route')
                    {{ route('business-details.index') }}
                @endslot
                @slot('title')
                    <svg class="inline-block mx-auto h-6 w-6 text-black" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                    </svg><br>
                    Business Details
                @endslot
                @slot('description')
                    View Business Details
                @endslot
            @endcomponent

        </div>
    @endif

</x-app-layout>
