@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between fw-bold fs-4">
                    {{ __('Companies') }}
                    <a href="{{ url('companies/create') }}" class="btn btn-primary">{{ __('Create') }}</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('Logo') }}</th>
                                <th scope="col">{{ __('Website') }}</th>
                                <th scope="col">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($companies->count())
                            @foreach($companies as $company)
                            <tr>
                                <th>{{ $company->id }}</th>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td><img src="{{ asset('storage/logos/' . $company->logo) }}" width="30"></td>
                                <td><a href="{{ $company->website }}">{{ $company->website }}</a></td>
                                <td>
                                    <a href="{{ url('companies/' . $company->id) }}" class="btn btn-primary">{{ __('View') }}</a>
                                    <a href="{{ url('companies/' . $company->id . '/edit') }}" class="btn btn-secondary">{{ __('Edit') }}</a>
                                    <a href="{{ url('companies/' . $company->id) }}" class="btn btn-danger" onclick="event.preventDefault();
                                                     document.getElementById('delete-form-{{ $company->id }}').submit();">{{ __('Delete') }}</a>
                                    <form id="delete-form-{{ $company->id }}" action="{{ url('companies/' . $company->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <th colspan="6" class="text-center">{{ __('No Companies Found') }}</th>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                {!! $companies->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection