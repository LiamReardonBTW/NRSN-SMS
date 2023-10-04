<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="bg-gray-50 border-b-2 border-gray-400 ">
        @livewire('navigation-menu')
        <!-- Page Content -->
        <main>
            <!-- Page Heading -->
            @if (isset($header))
                <header class="py-3 bg-blue-300 bg-opacity-20 border-b-2 border-blue-200">
                    <div class="max-w-7xl m-auto px-4 lg:px-8 text-2xl font-bold">
                        {{ $header }}
                    </div>
                </header>
                @if(session('alert-fail'))
                    <div class="py-1 bg-red-500 border-b-2 border-t-2 border-red-900">
                            <div class="max-w-7xl text-white m-auto px-4 lg:px-8 text-2xl font-bold">
                                {{ session('alert-fail') }}
                            </div>
                        </div>
                  @endif
            @endif

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 border-gray-200 border-x-2">

                <div class="min-h-screen pt-5">


                    <!-- Main Content -->
                    {{ $slot }}

                </div>

            </div>
    </div>

    </main>

    @stack('modals')
    @livewireScripts
</body>

</html>
