<!-- Secondary navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container">
        <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#secondaryNavbar" aria-controls="secondaryNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-md-flex justify-content-center" id="secondaryNavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard.*') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">My Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('medtracker.*') ? 'active' : '' }}" href="{{ route('medtracker.index') }}">MedTracker</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

