@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>This is your dashboard.</p>

                        <a class="btn btn-warning" href="{{ route('cars.index') }}">
                            <i class="bi bi-bag"></i> Manage cars</a>

                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection