@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Server Information') }}</div>

                <div class="card-body">
                    <p class="card-text">
                        <strong>Laravel version:</strong> {{ app()->version() }}
                    </p>
                    <p class="card-text">
                        <strong>Server software:</strong> {{ $_SERVER['SERVER_SOFTWARE'] }}
                    </p>
                    <p class="card-text">
                        <strong>IP address:</strong> {{ file_get_contents("https://ipecho.net/plain") }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    Your role is:
                    @hasrole('admin')
                        Admin
                    @else
                        User
                    @endhasrole
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    Your role is:
                    @hasrole('admin')
                        Admin
                    @else
                        User
                    @endhasrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
