<!-- Edit profile form -->
<div class="container">
    <form method="POST" action="{{ route('dashboard.profile.password.store') }}" class="form">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">
                <h5 class="card-title">Update Password</h5>
            </div>
            <div class="card-body">
                @csrf

                @include('components.dashboard.profile.password.edit-fields')

            </div>
            <div class="card-footer">
                <button type="button" onclick="history.back()" class="btn btn-secondary">Cancel</button>
                <button type="submit" class="btn btn-primary">Save password</button>
            </div>
        </div>
    </form>
</div>
