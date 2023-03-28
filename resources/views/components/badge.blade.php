@props([
    'color' => 'indigo',
])

<span {!! $attributes->merge([
    'class' =>
        'bg-' .
        $color .
        '-100 text-' .
        $color .
        '-800 text-xs font-extrabold mr-2 px-2.5 py-0.5 rounded dark:bg-' .
        $color .
        '-200 dark:text-' .
        $color .
        '-800',
]) !!}>
    {{ $slot }}
</span>