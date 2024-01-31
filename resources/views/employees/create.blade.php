<x-layout>
    <h1 class="mt-4">Edit employee</h1>
    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
         
        <div class="row g-3">
            <div class="col-md-5">
                <x-form.input name="first_name" descriptive-name="First Name"/>
            </div>
            <div class="col-md-2">
                <x-form.input name="middle_initial" descriptive-name="Middle Initial"/>
            </div>
            <div class="col-md-5">
                <x-form.input name="last_name" descriptive-name="Last Name"/>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <x-form.dropdown name="department_id" descriptive-name="Department">
                    <option value="" selected>
                        Select a Department
                    </option>
                    @foreach ($departments as $department)
                        <option
                            value="{{ $department->id }}"
                            {{ old('department_id') == $department->id
                                ?'selected'
                                :''
                            }}
                        >
                            {{ $department->name }}
                        </option>
                    @endforeach
                </x-form.dropdown>
            </div>
            <div class="col-md-6">
                <x-form.dropdown name="supervisor_id" descriptive-name="Supervisor">
                    <option value="">
                        Select a Supervisor
                    </option>
                    @foreach ($supervisors as $supervisor)
                        <option
                            value="{{ $supervisor->id }}"
                            {{ old('supervisor_id') == $supervisor->id
                                ?'selected'
                                :''
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
                <x-form.input name="job_title" descriptive-name="Job Title"/>
            </div>
            <div class="col-md-6">
                <x-form.textarea 
                    name="job_description" 
                    descriptive-name="Job Description" 
                    value="{{ old('job_description') }}"
                >
                </x-form.textarea>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <x-form.input 
                    type="date" 
                    name="birthdate" 
                    descriptive-name="Birthdate"
                />
            </div>
            <div class="col-md-6">
                <x-form.input 
                    type="file" 
                    name="profile_picture" 
                    descriptive-name="Profile Picture"
                />
            </div>
        </div>
        <input 
            type="hidden" 
            name="is_active" 
            value="1"
        >
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</x-layout>
