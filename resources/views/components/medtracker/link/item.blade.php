<!-- Link list item -->
<tr>
    <td><a href="#" data-bs-toggle="modal" data-bs-target="#{{ $link->slug . '-link-modal' }}">{{ $link->slug }}</a></td>
    <td>{{ $link->description }}</td>
    <td>{{ $link->isTimedLink($link->slug) ? 'Yes' : 'No' }}</td>
    <td>{{ $link->clicks }}</td>
    <td>
        <div class="copy-link-container">
            <a href="#" onclick="copyToClipboard('{{ $link->getShareLink($link->slug) }}', this)">Copy Link</a>
            <span class="text-muted link-copied-feedback" id="{{ $link->slug . '-link-copied-feedback' }}"></span>
        </div>
    </td>
    <td><a href="{{ route('medtracker.links.destroy', $link) }}">Delete</a></td>
</tr>

