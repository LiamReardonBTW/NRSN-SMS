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

    <div class="bg-gray-100 border-b-2 border-gray-400">
        @livewire('navigation-menu')
        <!-- Page Content -->
        <main>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-gray-50 shadow-xl min-h-screen  border-x-2 border-gray-400">

                    <!-- Page Heading -->
                    @if (isset($header))
                        <header class="pt-3 pb-3 mb-5 bg-blue-300 bg-opacity-20 border-b-2 border-blue-200">
                            <div class="px-4 lg:px-8 text-2xl font-bold">
                                {{ $header }}
                            </div>
                        </header>
                    @endif

                    <!-- Main Content -->
                    {{ $slot }}

                </div>

            </div>

    </div>
    <div class="bg-gray-50 h-16 text-center px-5 py-5">
        Footer
    </div>
    </main>

    @stack('modals')
    @livewireScripts
</body>

</html>
