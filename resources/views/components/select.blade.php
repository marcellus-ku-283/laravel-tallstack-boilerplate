@props([
    'disabled' => false,
    'color' => 'indigo',
])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'h-10 border-gray-300 focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 rounded-md shadow-sm text-sm bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5',
]) !!}>
    {{ $slot }}
</select>

@if (Arr::has($attributes, 'wire:model'))
    @error($attributes['wire:model'])
        <span class="text-sm font-medium text-red-700 error">{{ $message }}</span>
    @enderror
@endif
