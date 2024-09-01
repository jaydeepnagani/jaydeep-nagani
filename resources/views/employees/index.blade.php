@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between fw-bold fs-4">
                    {{ __('employees') }}
                    <a href="{{ url('employees/create') }}" class="btn btn-primary">{{ __('Create') }}</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Firstname') }}</th>
                                <th scope="col">{{ __('Lastname') }}</th>
                                <th scope="col">{{ __('Company') }}</th>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('Phone') }}</th>
                               
                                <th scope="col">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($employees->count())
                            @foreach($employees as $employee)
                            <tr>
                                <th>{{ $employee->id }}</th>
                                <td>{{ $employee->firstname }}</td>
                                <td>{{ $employee->lastname }}</td>
                                <td>{{ $employee->company->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                               
                                <td>
                                    <a href="{{ url('employees/' . $employee->id) }}" class="btn btn-primary">{{ __('View') }}</a>
                                    <a href="{{ url('employees/' . $employee->id . '/edit') }}" class="btn btn-secondary">{{ __('Edit') }}</a>
                                    <a href="{{ url('employees/' . $employee->id) }}" class="btn btn-danger" onclick="event.preventDefault();
                                                     document.getElementById('delete-form-{{ $employee->id }}').submit();">{{ __('Delete') }}</a>
                                    <form id="delete-form-{{ $employee->id }}" action="{{ url('employees/' . $employee->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <th colspan="7" class="text-center">{{ __('No Employees Found') }}</th>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                {!! $employees->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection