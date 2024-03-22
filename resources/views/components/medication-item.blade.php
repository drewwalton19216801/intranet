<!-- Medication list item -->
<tr>
    <td>{{ $medication->name }}</td>
    <td>{{ $medication->description }}</td>
    <td>{{ $medication->dosage }}</td>
    <td>
        @include('components.medication-actions', ['medication' => $medication])
    </td>
</tr>
