<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Employee;
use App\Models\Department;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('department')->get();

        return view('employees.index', [
            'employees' => $employees,
        ]);
    }

    public function show(Employee $employee)
    {
        return view('employees.show', [
            'employee' => $employee
        ]);
    }

    public function create(Employee $employee)
    {
        $departments = Department::all();
        $supervisors = User::all();

        return view('employees.create', [
            'employee' => $employee,
            'departments' => $departments,
            'supervisors' => $supervisors
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $this->validateEmployee();
        Employee::create($attributes);

        return redirect(route('employees.index'))->with('success', 'Employee registered!');
    }

    protected function validateEmployee(?Employee $employee = null): array
    {
        $employee ??= new Employee();
        return request()->validate([
            'first_name' => 'required',
            'middle_initial' => 'required|string',
            'last_name' => 'required',
            'supervisor_id' => 'required',
            'department_id' => 'sometimes|nullable',
            'job_title' => 'required',
            'is_active' => 'required',
            'job_description' => [
                'required',
                'min:3',
                'max:512'
            ],
            'birthdate' => [
                'required',
                Rule::unique('employees')->ignore($employee->id),
            ],
        ], [
            'supervisor_id.required' => 'The supervisor field is required.',
        ]);
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', [
            'employee' => $employee,
            'supervisors' => User::select('id', 'name')->get(),
            'departments' => Department::all(),
        ]);
    }

    public function update(Employee $employee)
    {
        $attributes = $this->validateEmployee($employee);
        $employee->update($attributes);
        return back()->with('success', 'Successfully updated employee!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee soft deleted!');
    }

    public function restore(Employee $employee)
    {
        $employee->restore();
        return redirect()->route('employees.index')->with('success', 'Employee restored!');
    }

}
