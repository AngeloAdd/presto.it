@extends('layouts.app')

@section('content')
<div class="container pt-4 mt-2">
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

                    Sei entrato con successo!!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
