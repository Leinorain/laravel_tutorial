<x-layout>
    <h1>Employees Index Page!</h1>
    <!-- TEST -->
    @foreach ($employees as $employee)
        <p>{{ $employee->id }}</p>
    @endforeach

</x-layout>
