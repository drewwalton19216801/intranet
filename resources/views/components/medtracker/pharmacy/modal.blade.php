<!-- pharmacy modal dialog -->
<div class="modal fade" id="{{ $pharmacy->id . '-pharmacy-modal' }}" tabindex="-1" aria-labelledby="pharmacyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pharmacyModalLabel">Edit Pharmacy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('medtracker.pharmacies.update', $pharmacy) }}">
                    @csrf
                    <input type="hidden" name="pharmacy_id" id="pharmacy_id" value="{{ $pharmacy->id }}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $pharmacy->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $pharmacy->phone }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3">{{ $pharmacy->address }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ $pharmacy->city }}" required>
                    </div>
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state" name="state" value="{{ $pharmacy->state }}" required>
                    </div>
                    <div class="form-group">
                        <label for="zip">Zip Code</label>
                        <input type="text" class="form-control" id="zip" name="zip" value="{{ $pharmacy->zip }}" required>
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
