<!-- Edit profile form -->
<div class="container">
    <form method="POST" action="{{ route('dashboard.profile.update') }}" class="form">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">
                <h5 class="card-title">Update Profile</h5>
            </div>
            <div class="card-body">
                @csrf

                @include('components.dashboard.profile.edit-fields')

            </div>
            <div class="card-footer">
                <button type="button" onclick="history.back()" class="btn btn-secondary">Cancel</button>
                <button type="submit" class="btn btn-primary">Save profile</button>
            </div>
        </div>
    </form>
</div>
