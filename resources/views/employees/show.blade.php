<x-layout>
    <h1>Selected Employee Page!</h1>

    <!-- TEST -->
    <h2>Hello {{ $employee->full_name }}!</h2>
    <h5>Company Id Number: {{ $employee->id }}</h5>
    {{-- {{ age() }} --}}
    <p>Age: {{ $employee->age() }}</p>

    <!-- resources/views/employees/show.blade.php -->




        @forelse ($employee->department->employees->where('id', '<>', $employee->id) as $colleague)
            <p>{{ $colleague->first_name }} (Job Title: {{ $colleague->job_title }})</p>
        @empty
            <p>No colleagues in the same department</p>
        @endforelse

</x-layout>
