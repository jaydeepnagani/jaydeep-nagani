<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeesRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Paginator::useBootstrap();
        $employees = Employee::latest()->paginate(10);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employee = new Employee();
        $companies = Company::all();
        return view('employees.form', compact('employee', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeesRequest $request)
    {
        $data = $request->validated();

        $employee = Employee::create($data);
        if ($employee) {
            return redirect(url('employees'))->with('success', 'Employees Created Successfully');
        }
        return redirect()->back()->with('error', __('Employees Create Failed'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        $companies = Company::all();
        return view('employees.form', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeesRequest $request, string $id)
    {
        $data = $request->validated();

        $employee = Employee::findOrFail($id);

        $result = $employee->update($data);
        if ($result) {
            return redirect(url('employees'))->with('success', 'Employee Updated Successfully');
        }
        return redirect()->back()->with('error', __('Employee Update Failed'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect(url('employees'))->with('success', 'Employee Deleted Successfully');
    }
}
