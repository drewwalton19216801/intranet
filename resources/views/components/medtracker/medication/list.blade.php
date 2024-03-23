<!-- Medication list -->
<div class="col-md-12">
    <h1>Medication List</h1>
    <div class="container">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Dosage</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medications as $medication)
                    @include('components.medtracker.medication.item', ['medication' => $medication])
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-left">
        <!-- New Medication Button -->
        <a class="btn btn-primary" href="{{ route('medtracker.medications.create') }}">New Medication</a>
        <!-- Save to PDF -->
        <a class="btn btn-primary mx-2" href="{{ route('medtracker.medications.pdf') }}">Save List to PDF</a>
    </div>
</div>

@foreach ($medications as $medication)
    @include('components.medtracker.medication.modal', ['medication' => $medication])
@endforeach
