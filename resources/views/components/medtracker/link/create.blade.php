<!-- Create link form -->
<div class="container">
    <form method="POST" action="{{ route('medtracker.links.store') }}" class="form">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">
                <h5 class="card-title">Create Link</h5>
            </div>
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" required>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('medtracker.links.index') }}" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Save Link</button>
            </div>
        </div>
    </form>
</div>
