<script>
    function copyToClipboard(text, feedbackElement) {
        var originalText = feedbackElement.textContent;
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(text)
                .then(function() {
                    setFeedback(feedbackElement, 'Link copied to clipboard!', originalText);
                })
                .catch(function(err) {
                    console.error('Could not copy text: ', err);
                });
        } else {
            fallbackCopyTextToClipboard(text, feedbackElement, originalText);
        }

        return true;
    }

    function setFeedback(element, message, originalText) {
        element.textContent = message;
        setTimeout(function() {
            element.textContent = originalText;
        }, 2000);
    }

    function fallbackCopyTextToClipboard(text, feedbackElement, originalText) {
        var textArea = document.createElement("textarea");
        textArea.value = text;

        // It's necessary to specify the width and height to get a scrollable area in Firefox.
        textArea.style.top = "0";
        textArea.style.left = "0";
        textArea.style.position = "fixed";

        textArea.style.width = "2em";
        textArea.style.height = "2em";

        document.body.appendChild(textArea);
        textArea.focus();
        textArea.select();

        try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            console.log('Copying text command was ' + msg);
            setFeedback(feedbackElement, 'Link copied to clipboard!', originalText);
        } catch (err) {
            console.error('Oops, unable to copy', err);
        }

        document.body.removeChild(textArea);
    }
</script>

<!-- Link list -->
<div class="col-md-12">
    <h1>Link List</h1>
    <div class="container table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Is Timed</th>
                    <th>Clicks</th>
                    <th>Share</th>
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

@foreach ($links as $link)
    @include('components.medtracker.link.modal', ['link' => $link])
@endforeach

