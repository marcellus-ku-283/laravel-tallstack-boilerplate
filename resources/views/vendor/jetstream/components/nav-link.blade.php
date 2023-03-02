@props(['active', 'menu'])

@php
    $classes = $active ?? false ? 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out' : 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition duration-150 ease-in-out';
@endphp


<a @class([
    'flex items-center p-2 rounded-md justify-start space-x-2',
    'bg-primary-500 text-white' => $active == true,
    'hover:bg-primary-500 hover:text-white  text-primary-700' => $active == false,
]) {{ $attributes->except(['class']) }}>
    <span aria-hidden="true">
        <svg @class(['h-5 w-5']) xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $menu['icon-path'] }}" />
        </svg>
    </span>
    <span class="text-sm md:text-md sm:text-sm lg:text-md">{{ $menu['label'] }}</span>
</a>
