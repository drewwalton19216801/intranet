@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List of Medications') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    @foreach ($medications as $medication)
                        <!-- List medications -->
                        <div class="card">
                            <div class="card-header">{{ $medication->name }}</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $medication->description }}</h5>
                                <p class="card-text">Dosage: {{ $medication->dosage }}</p>
                                <p class="card-text">Frequency: {{ $medication->frequency }}</p>
                                <p class="card-text">Start Date: {{ $medication->start_date }}</p>
                                <p class="card-text">End Date: {{ $medication->end_date }}</p>
                                <p class="card-text">Pharmacy: {{ $medication->pharmacy->name }}</p>
                                <p class="card-text">Prescribed By: {{ $medication->prescriber->name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
