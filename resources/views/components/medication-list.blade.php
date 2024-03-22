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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medications as $medication)
                    @include('components.medication-item', ['medication' => $medication])
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-left">
        <!-- New Medication Button -->
        <a class="btn btn-primary" href="{{ route('medication.create') }}">New Medication</a>
    </div>
</div>
