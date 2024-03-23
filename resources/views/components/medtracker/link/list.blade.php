<!-- Link list -->
<div class="col-md-12">
    <h1>Link List</h1>
    <div class="container">
        <table class="table table-hover table-striped table-responsive">
            <thead>
                <tr>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Is Timed</th>
                    <th>Clicks</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($links as $link)
                    @include('components.medtracker.link.item', ['link' => $link])
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-left my-2">
        <!-- New link Button -->
        <a class="btn btn-primary" href="{{ route('medtracker.links.create') }}">New Link</a>
    </div>
</div>
