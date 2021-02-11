@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success" style="text-align:center;">
                    <p>{{ $message }}</p>
                </div>
              @endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome You are Login!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
