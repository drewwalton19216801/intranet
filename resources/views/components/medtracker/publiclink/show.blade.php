<div class="page-content table-responsive container">
    <h2 style="text-align: center">Medication List for {{ $user->name }}</h2>
    <h4 style="text-align: center">Generated on {{ date('m/d/Y') }} at {{ date('g:i A') }}</h4>
    @if($link->expires_at != null)
        <h5 style="text-align: center">Link expires on {{ $link->expires_at->format('m/d/Y') }}</h5>
    @endif

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

    <!-- If route does not include download, show download button -->
    @if(!isset($download))
        <div class="d-flex justify-content-left my-2">
            <!-- New link Button -->
            <a class="btn btn-primary" href="{{ route('medtracker.publiclink.download', $link->slug) }}">Save as PDF</a>
        </div>
    @endif
</div>


