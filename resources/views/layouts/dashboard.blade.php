<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body data-bs-theme="dark">
    <div id="app">
        @include('components.navbars.brand')

        @auth
            @include('components.navbars.secondary')
        @endauth

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
