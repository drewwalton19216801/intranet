<!-- Pharmacy list item -->
<tr>
    <td><a href="#" data-bs-toggle="modal" data-bs-target="#{{ $pharmacy->id . '-pharmacy-modal' }}">{{ $pharmacy->name }}</a></td>
    <td>{{ $pharmacy->phone }}</td>
    <td>{{ $pharmacy->address }}</td>
    <td>{{ $pharmacy->city }}</td>
    <td>{{ $pharmacy->state }}</td>
    <td>{{ $pharmacy->zip }}</td>
</tr>
