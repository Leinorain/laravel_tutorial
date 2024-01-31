<x-layout>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
 
    <h1 class="mt-4">Register a new employee</h1>

    <form action="{{ route('employees.update', [$employee->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="row g-3">
            <div class="col-md-5">
                <x-form.input 
                    name="first_name" 
                    descriptive-name="First Name" 
                    :value="old('first_name', $employee->first_name)"
                />
            </div>
            <div class="col-md-2">
                <x-form.input 
                    name="middle_initial" 
                    descriptive-name="Middle Initial" 
                    :value="old('middle_initial', $employee->middle_initial)"
                />
            </div>
            <div class="col-md-5">
                <x-form.input 
                    name="last_name" 
                    descriptive-name="Last Name" 
                    :value="old('last_name', $employee->last_name)"
                />
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <x-form.dropdown name="department_id" descriptive-name="Department">
                    <option value="" selected>
                        No Department
                    </option>
                    @foreach ($departments as $department)
                        <option
                            value="{{ $department->id }}"
                            {{ old('department_id', $employee->department_id) == $department->id 
                            ? 'selected' 
                            : '' 
                            }}
                        >
                            {{ $department->name }}
                        </option>
                    @endforeach
                </x-form.dropdown>
            </div>
            <div class="col-md-6">
                <x-form.dropdown name="supervisor_id" descriptive-name="Supervisor">
                    @foreach ($supervisors as $supervisor)
                        <option 
                            value="{{ $supervisor->id }}" 
                            {{ old('supervisor_id', $employee->supervisor_id) == $supervisor->id 
                            ? 'selected' 
                            : '' 
                            }}
                        >
                            {{ $supervisor->name }}
                        </option>
                    @endforeach
                </x-form.dropdown>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <x-form.input 
                    name="job_title" 
                    descriptive-name="Job Title" 
                    :value="old('job_title', $employee->job_title)"
                />
            </div>
            <div class="col-md-6">
            <x-form.textarea
                name="job_description"
                descriptive-name="Job Description"
                value="{{ old('job_description', $employee->job_description) }}"
            >
            </x-form.textarea>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <x-form.input
                    type="date"
                    name="birthdate"
                    descriptive-name="Birthdate"
                    :value="old('birthdate', $employee->birthdate)"
                />
            </div>
            <div class="col-md-6">
                <x-form.input 
                    type="file" 
                    name="profile_picture" 
                    descriptive-name="Profile Picture"
                />
            </div>
            <input type="hidden" name="is_active" value="0">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</x-layout>
