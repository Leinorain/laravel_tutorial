<x-layout>
    <h1>Selected Employee Page!</h1>
    <h2>Hello {{ $employee->full_name }}!</h2>
    <p>Age: {{ $employee->age() }} (Job Title: {{ $employee->job_title }})</p>
    <h6>
        Subordinates (Same Department)
    </h6>
    @forelse ($employee->colleagues as $colleague)
        <p>{{ $colleague->full_name }} (Job Title: {{ $colleague->job_title }})</p>
    @empty
        <p>No colleagues in the same department</p>
    @endforelse
</x-layout>