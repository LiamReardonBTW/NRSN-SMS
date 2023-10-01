<nav x-data="{ open: false }" class="bg-white border-b-2 border-gray-400">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- Logo -->
                <div class="flex justify-center items-center w-48">
                    <a href="{{ route('dashboard') }}">
                        <!-- <x-application-mark class="block h-9 w-auto" /> -->
                        <img src="{{ asset('images/nrsn-logo-new.png') }}" alt="logo">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex sm:items-center">


                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="mt-1">
                        {{ __('DASHBOARD') }}
                    </x-nav-link>

                    <!-- Worker dropdown -->
                    @if (Auth::User()->role == 0 || Auth::User()->role == 1 || Auth::User()->role == 2) {{-- Check if user is worker, manager, or admin, when displaying content --}}
                    <div class="ml-3 relative mt-1">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        Worker

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">

                                <x-dropdown-link href="{{ route('myclients.index') }}">
                                    {{ __('My Clients') }}
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ route('myshifts.index') }}">
                                    {{ __('My Shifts') }}
                                </x-dropdown-link>



                            </x-slot>
                        </x-dropdown>
                    </div>
                    @endif

                    <!-- Manager dropdown-->
                    @if (Auth::User()->role == 0 || Auth::User()->role == 1) {{-- Check if user is manager, or admin, when displaying content --}}
                    <div class="ml-3 relative mt-1">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        Manager

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">

                                <x-dropdown-link href="{{ route('manageclients.index') }}">
                                    {{ __('Manage Clients') }}
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ route('manageshifts.index') }}">
                                    {{ __('Manage Shifts') }}
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ route('manageworkers.index') }}">
                                    {{ __('Manage Workers') }}
                                </x-dropdown-link>


                            </x-slot>
                        </x-dropdown>
                    </div>
                    @endif

                    <!-- Admin dropdown-->
                    @if (Auth::User()->role == 0) {{-- Check if user is admin, when displaying content --}}
                    <div class="ml-3 relative mt-1">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        Admin

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">

                                <x-dropdown-link href="{{ route('allclients.index') }}">
                                    {{ __('All Clients') }}
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ route('allshifts.index') }}">
                                    {{ __('All Shifts') }}
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ route('allusers.index') }}">
                                    {{ __('All Users') }}
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ route('clientcontracts.index') }}">
                                    {{ __('Client Contracts') }}
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ route('usercontracts.index') }}">
                                    {{ __('User Contracts') }}
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ route('activities.index') }}">
                                    {{ __('Activities') }}
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ route('invoicing.index') }}">
                                    {{ __('Invoicing') }}
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ route('business-details.index') }}">
                                    {{ __('Business Details') }}
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ route('allinvoices.index') }}">
                                    {{ __('All Invoices') }}
                                </x-dropdown-link>

                            </x-slot>
                        </x-dropdown>
                    </div>
                    @endif

                </div>

            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}"
                                        alt="{{ Auth::user()->first_name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">

            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            {{-- Worker responsive nav content --}}
            @if (Auth::User()->role == 0 || Auth::User()->role == 1 || Auth::User()->role == 2) {{-- Check if user is worker, manager, or admin, when displaying content --}}
            <x-responsive-nav-link-parent :href="'#'">
                <x-slot name="name">Worker</x-slot>
                <x-slot name="children">
                    <a href="{{ route('myclients.index') }}">My Clients</a><br>
                    <a href="{{ route('myshifts.index') }}">My Shifts</a>
                </x-slot>
            </x-responsive-nav-link-parent>
            @endif

            {{-- Manager responsive nav content --}}
            @if (Auth::User()->role == 0 || Auth::User()->role == 1) {{-- Check if user is manager, or admin, when displaying content --}}
            <x-responsive-nav-link-parent :href="'#'">
                <x-slot name="name">Manager</x-slot>
                <x-slot name="children">
                    <a href="{{ route('manageclients.index') }}">Manage Clients</a><br>
                    <a href="{{ route('manageshifts.index') }}">Manage Shifts</a><br>
                    <a href="{{ route('manageworkers.index') }}">Manage Workers</a>
                </x-slot>
            </x-responsive-nav-link-parent>
            @endif

            {{-- Admin responsive nav content --}}
            @if (Auth::User()->role == 0) {{-- Check if user is admin, when displaying content --}}
            <x-responsive-nav-link-parent :href="'#'">
                <x-slot name="name">Admin</x-slot>
                <x-slot name="children">
                    <a href="{{ route('allclients.index') }}">All Clients</a><br>
                    <a href="{{ route('allshifts.index') }}">All Shifts</a><br>
                    <a href="{{ route('allusers.index') }}">All Users</a><br>
                    <a href="{{ route('clientcontracts.index') }}">Client Contracts</a><br>
                    <a href="{{ route('usercontracts.index') }}">User Contracts</a><br>
                    <a href="{{ route('activities.index') }}">Activities</a><br>
                    <a href="{{ route('invoicing.index') }}">Invoicing</a><br>
                    <a href="{{ route('business-details.index') }}">Business Details</a><br>
                    <a href="{{ route('allinvoices.index') }}">All Invoices</a><br>
                </x-slot>
            </x-responsive-nav-link-parent>
            @endif

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                        :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <!-- Team Switcher -->
                    @if (Auth::user()->allTeams()->count() > 1)
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
</nav>
