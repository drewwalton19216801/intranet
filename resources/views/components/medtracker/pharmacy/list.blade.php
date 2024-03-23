<!-- Pharmacy list -->
<div class="col-md-12">
    <h1>Pharmacy List</h1>

    <div class="container">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pharmacies as $pharmacy)
                    @include('components.medtracker.pharmacy.item', ['pharmacy' => $pharmacy])
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-left">
        <!-- New Pharmacy Button -->
        <a class="btn btn-primary" href="{{ route('medtracker.pharmacies.create') }}">New Pharmacy</a>
    </div>
</div>

@foreach ($pharmacies as $pharmacy)
    @include('components.medtracker.pharmacy.modal', ['pharmacy' => $pharmacy])
@endforeach
