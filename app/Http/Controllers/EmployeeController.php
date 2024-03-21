<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $employees = Employee::with('department')->get();

        return view('employees.index', [
            'employees' => $employees,
        ]);
    }

    public function show(Employee $employee): View
    {
        return view('employees.show', [
            'employee' => $employee
        ]);
    }

    public function create(Employee $employee): View
    {
        $departments = Department::all();
        $supervisors = User::all();

        return view('employees.create', [
            'employee' => $employee,
            'departments' => $departments,
            'supervisors' => $supervisors
        ]);
    }

    public function store(Request $request): RedirectResponse
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

    public function edit(Employee $employee): View
    {
        return view('employees.edit', [
            'employee' => $employee,
            'supervisors' => User::select('id', 'name')->get(),
            'departments' => Department::all(),
        ]);
    }

    public function update(Employee $employee): RedirectResponse
    {
        $attributes = $this->validateEmployee($employee);
        $employee->update($attributes);
        return back()->with('success', 'Successfully updated employee!');
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee soft deleted!');
    }

    public function restore(Employee $employee): RedirectResponse
    {
        $employee->restore();
        return redirect()->route('employees.index')->with('success', 'Employee restored!');
    }

}
