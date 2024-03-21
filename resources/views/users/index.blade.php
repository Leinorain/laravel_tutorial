<x-layout>
    @foreach ($users as $user)
        <h4>{{ $user->name }}</h4>
        <ul>
            <li>email: {{ $user->email }}</li>
        </ul>
            @if (($user->subordinates)->isNotEmpty())
                <h6>
                    Subordinates:
                </h6>
                <ul>
                    @foreach ($user->subordinates as $subordinate)
                        <li>{{ $subordinate->full_name }} : {{ $subordinate->job_title }}</li>
                    @endforeach
                </ul>
            @endif
    @endforeach
</x-layout>
 