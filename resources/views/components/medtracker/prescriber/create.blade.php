<!-- Create prescriber form -->
<div class="container">
    <form method="POST" action="{{ route('medtracker.prescribers.store') }}" class="form">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">
                <h5 class="card-title">Create Prescriber</h5>
            </div>
            <div class="card-body">

                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" class="form-control" id="state" name="state" required>
                </div>
                <div class="form-group">
                    <label for="zip">Zip</label>
                    <input type="text" class="form-control" id="zip" name="zip" required>
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ route('medtracker.prescribers.index') }}" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Save Prescriber</button>
            </div>
        </div>
    </form>
</div>
