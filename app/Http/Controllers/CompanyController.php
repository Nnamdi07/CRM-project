<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;


class CompanyController extends Controller
{
    public function index()
    {
        $company =  Company::paginate(10);

        return view('company.index', ['company' => $company]);
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(CompanyRequest $request)
    {

        $company = new Company;

        $company->name = $request->name;
        $company->website = $request->website;
        $company->email = $request->email;


        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $file = $request->file('logo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $path = 'storage/app/public';
            $file->move(public_path($path), $filename);
            $company->logo = $path . '/' . $filename;
        }



        $company->save();

        return redirect()->route('company.index');
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('company.show', ['company' => $company]);
    }

    public function edit($id)
    {
        $company = Company::find($id);
        return view('company.edit', ['company' => $company]);
    }

    public function update(CompanyRequest $request, $id)
    {

        $company = Company::findOrFail($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $file = $request->file('logo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $path = 'storage/app/public';
            $file->move(public_path($path), $filename);
            $company->logo = $path . '/' . $filename ?? $company->logo;
        }

        $company->save();

        return redirect()->route('company.index');
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('company.index');
    }
}
