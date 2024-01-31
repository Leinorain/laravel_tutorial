@props([
    'name',
    'descriptiveName'
])
 
<x-form.label name="{{ $name }}" descriptive-name="{{ $descriptiveName }}" />
    <select name="{{ $name }}" class="form-select">
        {{ $slot }}
    </select>
<x-form.error name="{{ $name }}" />