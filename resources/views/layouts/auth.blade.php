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
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/medtracker') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        @auth
            <!-- Secondary navbar -->
            <nav class="navbar navbar-expand-md navbar-dark bg-primary">
                <div class="container">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <!-- Link to medications list, only active if route is medications -->
                            <a class="nav-link {{ request()->routeIs('medtracker.medications.*') ? 'active' : '' }}"
                                href="{{ route('medtracker.medications.index') }}">Medications</a>
                        </li>
                        <li class="nav-item">
                            <!-- Link to pharmacies list, only active if route is pharmacies -->
                            <a class="nav-link {{ request()->routeIs('medtracker.pharmacies.*') ? 'active' : '' }}"
                                href="{{ route('medtracker.pharmacies.index') }}">Pharmacies</a>
                        </li>
                        <li class="nav-item">
                            <!-- Link to prescribers list, only active if route is prescribers -->
                            <a class="nav-link {{ request()->routeIs('medtracker.prescribers.*') ? 'active' : '' }}"
                                href="{{ route('medtracker.prescribers.index') }}">Prescribers</a>
                        </li>
                    </ul>
                </div>
            </nav>
        @endauth

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
