<!-- Medication list item -->
<tr>
    <td><a href="#" data-bs-toggle="modal" data-bs-target="#{{ $medication->id . '-medication-modal' }}">{{ $medication->name }}</a></td>
    <td>{{ $medication->description }}</td>
    <td>{{ $medication->dosage }}</td>
    <td><a href="{{ route('medtracker.medications.destroy', $medication) }}">Delete</a></td>
</tr>
