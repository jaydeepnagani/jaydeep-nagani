@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    {{ __('Show Employee') }}
                </div>

                <div class="card-body">
                    <div class="form-group mb-5">
                        <label for="firstname" class="col-md-5 text-end">{{ __('Firstname') }} :</label>
                        {{ $employee->firstname }}<br>

                        <label for="lastname" class="col-md-5 text-end">{{ __('Lastname') }} :</label>
                        {{ $employee->lastname }}<br>

                        <label for="company" class="col-md-5 text-end">{{ __('Company') }} :</label>
                        {{ $employee->company->name }}<br>

                        <label for="email" class="col-md-5 text-end">{{ __('Email') }} :</label>
                        {{ $employee->email }}<br>

                        <label for="phone" class="col-md-5 text-end">{{ __('Phone') }} :</label>
                        {{ $employee->phone }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection