@extends('layouts.app')

@section('content')
<div class="container pt-4 mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Candidati') }}</div>
                <div class="card-body">
                    <form method="GET" enctype="multipart/form-data" action="{{ route('application') }}">
                        @csrf
                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="curriculum" class="col-md-4 col-form-label text-md-right">{{ __('Upload del CV') }}</label>

                            <div class="col-md-6">
                                <input id="curriculum" type="file" class="form-control @error('curriculum') is-invalid @enderror" name="curriculum" value="{{old('curriculum')}}">

                                @error('curriculum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Parlaci di te') }}</label>
                            <div class="col-md-6">
                                <textarea id="message" class="form-control" rows="6" @error('message') is-invalid @enderror" name="message">{{old('message')}}</textarea>
                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                                <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn main-bg text-white">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
