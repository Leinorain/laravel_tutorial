@props([
   'name',
   'descriptiveName',
   'value'
])
 
<x-form.label name="{{ $name }}" descriptive-Name="{{ $descriptiveName }}" />

<textarea class="form-control" name="{{ $name }}" id="{{ $name }}">{{ $value }}</textarea>

<x-form.error name="{{ $name }}" />