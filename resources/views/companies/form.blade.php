@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    @if($company->id)
                    {{ __('Edit Company') }}
                    @else
                    {{ __('Create Company') }}
                    @endif
                </div>

                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="{{ ($company->id) ? url('companies/'. $company->id) : url('companies') }}">
                        @csrf
                        @if($company->id)
                        @method('PUT')
                        @endif

                        <div class="form-group row mb-2">
                            <label for="name" class="col-md-3 text-end">{{ __('Name') }}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Enter Name') }}" value="{{ $company->name }}">
                                {{ $errors->first('name') }}
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="email" class="col-md-3 text-end">{{ __('Email') }}</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('Enter Email') }}" value="{{ $company->email }}">
                                {{ $errors->first('email') }}
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="logo" class="col-md-3 text-end">{{ __('Logo') }}</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control-file" id="logo" name="logo" value="{{ $company->logo }}">
                                {{ $errors->first('logo') }}
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="website" class="col-md-3 text-end">{{ __('Website') }}</label>
                            <div class="col-md-9">
                                <input type="url" class="form-control" id="website" name="website" placeholder="{{ __('Enter Website') }}" value="{{ $company->website }}">
                                {{ $errors->first('website') }}
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