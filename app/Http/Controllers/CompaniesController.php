<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompaniesRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Paginator::useBootstrap();
        $companies = Company::latest()->paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $company = new Company();
        return view('companies.form', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompaniesRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $path = $file->storeAs('public/logos', time() . '.' . $file->getClientOriginalExtension());
            $data['logo'] = basename($path);
        }

        $company = Company::create($data);
        if ($company) {
            return redirect(url('companies'))->with('success', 'Company Created Successfully');
        }
        return redirect()->back()->with('error', __('Company Create Failed'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::findOrFail($id);
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
        return view('companies.form', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompaniesRequest $request, string $id)
    {
        $data = $request->validated();

        $company = Company::findOrFail($id);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $path = $file->storeAs('public/logos', time() . '.' . $file->getClientOriginalExtension());
            $data['logo'] = basename($path);
        }

        $result = $company->update($data);
        if ($result) {
            return redirect(url('companies'))->with('success', 'Company Updated Successfully');
        }
        return redirect()->back()->with('error', __('Company Update Failed'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect(url('companies'))->with('success', 'Company Deleted Successfully');
    }
}
