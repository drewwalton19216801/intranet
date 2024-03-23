<!-- Create medication form -->
<div class="container">
    <form method="POST" action="{{ route('medtracker.medications.store') }}" class="form">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">
                <h5 class="card-title">Create medication</h5>
            </div>
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="dosage">Dosage</label>
                    <input type="text" class="form-control" id="dosage" name="dosage" required>
                </div>
                <div class="form-group">
                    <label for="frequency">Frequency</label>
                    <input type="text" class="form-control" id="frequency" name="frequency" required>
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                </div>

                <div class="form-group">
                    <label for="prescriber_id">Prescriber</label>
                    <select class="form-control" id="prescriber_id" name="prescriber_id" required>
                        @foreach ($prescribers as $prescriber)
                            <option value="{{ $prescriber->id }}">{{ $prescriber->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="pharmacy_id">Pharmacy</label>
                    <select class="form-control" id="pharmacy_id" name="pharmacy_id" required>
                        @foreach ($pharmacies as $pharmacy)
                            <option value="{{ $pharmacy->id }}">{{ $pharmacy->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save medication</button>
            </div>
        </div>
    </form>
</div>
