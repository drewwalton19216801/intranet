<!-- Share Link modal dialog -->
<div class="modal fade" id="{{ $link->slug . '-link-modal' }}" tabindex="-1" aria-labelledby="linkModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="linkModalLabel">Edit Link</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('medtracker.links.update', $link) }}">
                    @csrf
                    <input type="hidden" name="link_id" id="link_id" value="{{ $link->id }}">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ $link->url }}">
                    </div>
                    <div class="form-group">
                        <label for="expires_at">Expiration Date</label>
                        <input type="date" class="form-control" id="expires_at" name="expires_at" value="{{ $link->expires_at?->format('Y-m-d') }}">
                        <!-- helper text -->
                        <small class="form-text text-muted">Leave blank to never expire</small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


