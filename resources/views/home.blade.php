@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @include('layouts.nav')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ (request()->routeIs('dashboard')) ? 'Dashboard' : '' }}</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <h5>This is the dashboard</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
