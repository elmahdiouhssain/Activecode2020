@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Hello ADMINISTRATOR, You are logged in!') }}

                    <p>See all <a href="{{ url('admin/tickets') }}">tickets</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection