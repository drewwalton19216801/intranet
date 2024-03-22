<style type="text/css">
    .push {
        position: absolute;
        bottom: 0;
        width: 100%;
    }
</style>

<h1>Medication List for {{ $user->name }}</h1>

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
            @include('components.medication.item-pdf', ['medication' => $medication])
        @endforeach
    </tbody>
</table>

<!-- push Footer to bottom -->
<div class="push">
<p class="text-center" style="position: bottom;">
    Generated on {{ date('Y-m-d H:i:s') }} by {{ $user->name }} using {{ config('app.name') }}
</p>
</div>
