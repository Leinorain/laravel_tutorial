<x-layout>
    @foreach ($projects as $project)
        <div>
            <h4>{{ $project->title }}</h4>
            <span>Supervisor: {{ $project->supervisor->name }}</span>
            <ul>
                @foreach ($project->assignedMembers as $member)
                    <li>{{ $member->fullName }}</li>
                @endforeach
            </ul>
        </div>
    @endforeach
</x-layout>