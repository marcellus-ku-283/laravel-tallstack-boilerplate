@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'focus:ring-primary rounded-md shadow-sm block w-full h-10 p-3.5 mt-1 border border-gray-300 bg-gray-50']) !!}>
