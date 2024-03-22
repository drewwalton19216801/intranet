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
                                <!-- Dropdown for the rest of the information -->
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        More Information
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('medication.edit', $medication->id) }}">Edit</a>
                                        <a class="dropdown-item" href="{{ route('medication.delete', $medication->id) }}">Delete</a>
                                    </ul>
                                </div>
                                <!-- End of dropdown -->
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
