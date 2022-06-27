<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee =  Employee::with('company')->paginate(10);
        return view('employee.index', ['employee' => $employee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::pluck('name', 'id');

        return view('employee.create', compact('company'));
    }

    public function store(EmployeeRequest $request)
    {
        $employee = new Employee;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->phone = $request->phone;
        $employee->email = $request->email;

        $employee->save();

        return redirect()->route('employee.index');
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.show', ['employee' => $employee]);
    }

    public function edit($id)
    {
        $employee = Employee::with('company')->find($id);
        $company = Company::pluck('name', 'id');

        return view('employee.edit', compact('employee', 'company'));
    }

    public function update(EmployeeRequest $request, $id)
    {

        $employee = Employee::findOrFail($id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();

        return redirect()->route('employee.index');
    }

    public function destroy($id)
    {

        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employee.index');
    }
}
