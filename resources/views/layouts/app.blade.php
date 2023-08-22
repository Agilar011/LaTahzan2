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
    <link rel="stylesheet" href="/css/style-landing.css">
    <link rel="stylesheet" href="/css/style-pesan-cust.css">
    <link rel="stylesheet" href="/css/style-konfirmasi.css">
    <link rel="stylesheet" href="/css/style-dashboard-admin.css">
    <link rel="stylesheet" href="/css/style-table.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="">
        @unless (auth()->user()->isAdmin())
            @livewire('navigation-menu')
        @endunless

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            <div>
                {{ $slot }}
            </div>
        @endif

        <main>
            @yield('conn')
            @yield('conn-admin')
        </main>

        <!-- Page Content -->

    </div>

    @stack('modals')

    @livewireScripts
</body>
<script>
    function toggleDropdown() {
        var dropdown = document.querySelector('.dropdown');
        dropdown.classList.toggle('active');
    }

    const dropdowns = document.querySelectorAll('.dropdown');
    dropdowns.forEach(dropdowns => {
        const select = dropdowns.querySelector('.select');
        const caret = dropdowns.querySelector('.caret');
        const menu = dropdowns.querySelector('.menu');
        const options = dropdowns.querySelector('.menu li');
        const selected = dropdowns.querySelector('.selected');

        select.addEventListener('click', () => {
            select.classList.toggle('select-clicked');
            caret.classList.toggle('caret-rotate');
            menu.classList.toggle('menu-open');
        });

        options.forEach(option => {
            option.addEventListener('click', () => {
                selected.innerText = option.innerText;
                select.classList.remove('select-clicked');
                caret.classList.remove('caret-rotate');
                menu.classList.remove('menu-open');
                options.forEach(option => {
                    option.classList.remove('active');
                });
                option.classList.add('active');
            });
        });
    });



</script>

</html>
