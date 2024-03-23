<nav class="navbar navbar-expand-md navbar-dark bg-secondary">
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
