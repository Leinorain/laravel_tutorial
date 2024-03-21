<x-layout>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
     
    <h1>Employees Index Page!</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">M.I.</th>
                <th scope="col">Last Name</th>
                <th scope="col">Job Title</th>
                <th scope="col">Birthdate</th>
                <th scope="col">Age</th>
                <th scope="col">Supervisor</th>
                <th scope="col">Department</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>
                        <div>
                            <p>{{ $employee->first_name }}</p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <p>{{ $employee->middle_initial }}</p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <p>{{ $employee->last_name }}</p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <p>{{ $employee->job_title }}</p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <p>{{ $employee->birthdate }}</p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <p>{{ $employee->age() }}</p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <p>
                                {{ $employee->supervisor->name }}
                            </p>
                        </div>
                    </td>
                    <td>
                        <div>
                            <p>
                                {!! $employee->department->name ?? '<span class="no-data">No Department</span>' !!}
                            </p>
                        </div>
                    </td>
                    <td>
                        <div class="buttons">
                            <form form method="POST" action="{{ route('employees.destroy', ['employee' => $employee->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                    <i class="fa fa-fw fa-trash"></i>
                                </button>
                            </form>
                            <form method="GET" action="{{ route('employees.edit', ['employee' => $employee->id]) }}">
                                @csrf
                                <button class="btn btn-secondary">
                                    <i class="fa fa-fw fa-edit"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>