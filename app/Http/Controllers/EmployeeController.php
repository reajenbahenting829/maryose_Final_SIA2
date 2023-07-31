<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Employee;
use App\Models\Account;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $employees = Employee::all();
        $query = Employee::query();
        if ($search) {
            $query->where('fname', 'like', '%' . $search . '%')
                ->orWhere('lname', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%')
                ->orWhere('age', 'like', '%' . $search . '%')
                ->orWhere('job', 'like', '%' . $search . '%')
                ->orWhere('year', 'like', '%' . $search . '%');
        }
        $employees = $query->get();

        return Inertia::render('Account/Employees/Index', [
            'employees' => $employees,
            'search' => $search,
        ])->withViewData(['search' => $search]);
    }

    public function create()
    {
        return Inertia::render('Account/Employees/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'age' => 'required|string',
            'address' => 'required|string',
            'job' => 'required|string',
            'year' => 'required|string',
        ]);
        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);

        return Inertia::render('Employees/Edit', [
            'employee' => $employee,
        ]);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'age' => 'required|string',
            'address' => 'required|string',
            'department' => 'required|string',
            'yr_level' => 'required|string',
            'adviser' => 'required|string',
        ]);
        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $id)
    {
        $id->delete();

        return redirect()->route('employees.index')->with('danger', 'Employee Deleted Successfully.');
    }

    public function generate(Employee $employee)
    {

        $pdf = PDF::loadView('pdf.employee', [
            'employee' => $employee
        ]);

        return $pdf->stream();
    }
}
