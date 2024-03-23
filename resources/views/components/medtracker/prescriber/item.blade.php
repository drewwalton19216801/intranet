<!-- prescriber list item -->
<tr>
    <td><a href="#" data-bs-toggle="modal" data-bs-target="#{{ $prescriber->id . '-prescriber-modal' }}">{{ $prescriber->name }}</a></td>
    <td>{{ $prescriber->phone }}</td>
    <td>{{ $prescriber->address }}</td>
    <td>{{ $prescriber->city }}</td>
    <td>{{ $prescriber->state }}</td>
    <td>{{ $prescriber->zip }}</td>
    <td><a href="{{ route('medtracker.prescribers.destroy', $prescriber) }}">Delete</a></td>
</tr>
