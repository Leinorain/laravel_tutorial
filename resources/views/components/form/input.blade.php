@props([
   'name',
   'descriptiveName',
   'type' => 'text',
])
 
<x-form.label name="{{ $name }}" descriptive-name="{{ $descriptiveName }}" />

<input
   class="form-control"
   type="{{ $type }}"
   name="{{ $name }}"
   id="{{ $name }}"
   {{ $attributes(['value' => old($name)]) }}
>

<x-form.error name="{{ $name }}" />