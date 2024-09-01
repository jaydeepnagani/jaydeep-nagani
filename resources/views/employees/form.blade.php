@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    @if($employee->id)
                    {{ __('Edit employee') }}
                    @else
                    {{ __('Create employee') }}
                    @endif
                </div>

                <div class="card-body">
                    <form method="post" action="{{ ($employee->id) ? url('employees/'. $employee->id) : url('employees') }}">
                        @csrf
                        @if($employee->id)
                        @method('PUT')
                        @endif

                        <div class="form-group row mb-2">
                            <label for="firstname" class="col-md-3 text-end">{{ __('Firstname') }}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="{{ __('Enter Firstname') }}" value="{{ $employee->firstname }}">
                                {{ $errors->first('firstname') }}
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="lastname" class="col-md-3 text-end">{{ __('Lastname') }}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="{{ __('Enter Lastname') }}" value="{{ $employee->lastname }}">
                                {{ $errors->first('lastname') }}
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="company_id" class="col-md-3 text-end">{{ __('Company') }}</label>
                            <div class="col-md-9">
                                <select class="form-control" id="company_id" name="company_id">
                                    <option value="">{{ __('Select Company') }}</option>
                                    @foreach($companies as $company)
                                    <option value="{{ $company->id }}" {{ $company->id == $employee->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
                                    @endforeach
                                    {{ $errors->first('company_id') }}
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="email" class="col-md-3 text-end">{{ __('Email') }}</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('Enter Email') }}" value="{{ $employee->email }}">
                                {{ $errors->first('email') }}
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="phone" class="col-md-3 text-end">{{ __('phone') }}</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="phone" name="phone" placeholder="{{ __('Enter phone') }}" value="{{ $employee->phone }}">
                                {{ $errors->first('phone') }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="website" class="col-md-3"></label>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection