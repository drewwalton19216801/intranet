<!-- Secondary navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <!-- Link to dashboard -->
                <a class="nav-link {{ request()->routeIs('dashboard.*') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">My Dashboard</a>
            </li>
            <li class="nav-item">
                <!-- Link to MedTracker -->
                <a class="nav-link {{ request()->routeIs('medtracker.*') ? 'active' : '' }}" href="{{ route('medtracker.index') }}">MedTracker</a>
            </li>
        </ul>
    </div>
</nav>
