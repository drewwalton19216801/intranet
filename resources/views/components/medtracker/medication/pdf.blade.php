<div class="page-content">
    <h2 style="text-align: center">Medication List for {{ $user->name }}</h2>
    <h4 style="text-align: center">Generated on {{ date('m/d/Y') }} at {{ date('g:i A') }}</h4>

    <table class="table table-striped" style="width: 100%;">
        <thead>
            <tr>
                <th style="text-align: left">Name</th>
                <th style="text-align: left">Description</th>
                <th style="text-align: left">Dosage</th>
                <th style="text-align: left">Frequency</th>
                <th style="text-align: left">Prescriber</th>
                <th style="text-align: left">Pharmacy</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medications as $medication)
                @include('components.medtracker.medication.item-pdf', ['medication' => $medication])
            @endforeach
        </tbody>
    </table>
</div>


