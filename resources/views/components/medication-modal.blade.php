<!-- Medication modal dialog -->
<div class="modal fade" id="{{ $medication->id . '-medication-modal' }}" tabindex="-1" aria-labelledby="medicationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="medicationModalLabel">Edit Medication</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('medications.update', $medication) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $medication->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $medication->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="dosage">Dosage</label>
                        <input type="text" class="form-control" id="dosage" name="dosage" value="{{ $medication->dosage }}" required>
                    </div>
                    <div class="form-group">
                        <label for="frequency">Frequency</label>
                        <input type="text" class="form-control" id="frequency" name="frequency" value="{{ $medication->frequency }}" required>
                    </div>
                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $medication->start_date }}" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $medication->end_date }}" required>
                    </div>
                    <!-- TODO: Add Prescriber and Pharmacy fields -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
