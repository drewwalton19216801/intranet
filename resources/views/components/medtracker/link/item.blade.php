<!-- Link list item -->
<tr>
    <td>{{ $link->slug }}</td>
    <td>{{ $link->description }}</td>
    <td>{{ $link->isTimedLink($link->slug) ? 'Yes' : 'No' }}</td>
    <td>{{ $link->clicks }}</td>
    <td><a href="{{ route('medtracker.links.destroy', $link) }}">Delete</a></td>
</tr>
