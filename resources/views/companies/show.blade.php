@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    {{ __('Show Company') }}
                </div>

                <div class="card-body">
                    <div class="form-group  mb-5 ">
                        <label for="name" class="col-md-5  text-end">{{ __('Name') }} :</label>
                        {{ $company->name }}<br>

                        <label for="email" class="col-md-5 text-end">{{ __('Email') }} :</label>
                        {{ $company->email }}<br>

                        <label for="logo" class="col-md-5 text-end">{{ __('Logo') }} :</label>
                        <img src="{{ asset('storage/logos/' . $company->logo) }}" width="50"><br>

                        <label for="website" class="col-md-5 text-end">{{ __('Website') }} :</label>
                        <a href="{{ $company->website }}">{{ $company->website }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection