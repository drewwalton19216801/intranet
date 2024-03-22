<!-- Medication list item -->
<tr>
    <td>{{ $medication->name }}</td>
    <td>{{ $medication->description }}</td>
    <td>{{ $medication->dosage }}</td>
    <td>{{ $medication->frequency }}</td>
    <td>{{ $medication->start_date }}</td>
    <td>{{ $medication->end_date }}</td>
    <td>{{ $medication->prescriber->name }}</td>
    <td>{{ $medication->pharmacy->name }}</td>
</tr>
