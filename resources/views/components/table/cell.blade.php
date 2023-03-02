<td {!! $attributes->merge(['class' => 'py-3.5 pl-4 pr-3 text-left text-sm text-gray-500 sm:pl-6 dark:text-white']) !!}>
    {{ $value ?? $slot }}
</td>
