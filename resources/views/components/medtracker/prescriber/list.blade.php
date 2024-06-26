<!-- Prescriber list -->
<div class="col-md-12">
    <h1>Prescriber List</h1>

    <div class="container table-responsive">
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
                @foreach ($prescribers as $prescriber)
                    @include('components.medtracker.prescriber.item', ['prescriber' => $prescriber])
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-left">
        <!-- New Prescriber Button -->
        <a class="btn btn-primary my-2" href="{{ route('medtracker.prescribers.create') }}">New Prescriber</a>
    </div>
</div>

@foreach ($prescribers as $prescriber)
    @include('components.medtracker.prescriber.modal', ['prescriber' => $prescriber])
@endforeach
