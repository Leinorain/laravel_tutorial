<x-layout>
    @foreach ($usersWithEmployees as $user)
        <h4>{{ $user->name }}</h4>
        <ul>
            <li>email: {{ $user->email }}</li>
        </ul>
            @if (($user->employees)->isNotEmpty())
                <h6>
                    Subordinates
                </h6>
                <ul>
                    @foreach ($user->employees as $employee)
                        <li>{{ $employee->first_name }} {{ $employee->middle_initial }}. {{ $employee->last_name }} : {{ $employee->job_title }}</li>
                    @endforeach
                </ul>
            @endif
    @endforeach
</x-layout>
