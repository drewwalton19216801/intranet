@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Expired Link') }}</div>
                    <div class="card-body">
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Link Expired</h4>
                            <p>The link you requested has expired.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection
