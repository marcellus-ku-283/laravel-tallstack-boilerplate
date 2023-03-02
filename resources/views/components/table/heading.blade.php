@props([
    'sortable' => null,
    'direction' => null,
])

<th {{ $attributes->merge([
        'class' => 'py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 dark:bg-slate-700 dark:text-white',
    ])->only('class') }}
    scope="col">
    @unless($sortable)
        <span>
            {{ $slot }}
        </span>
    @else
        <button {{ $attributes->except('class') }} class="flex items-center space-x-1">
            <span>{{ $slot }}</span>
            <span>
                @if ($direction === 'asc')
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                @elseif($direction == 'desc')
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                    </svg>
                @else
                    <svg class="w-3 h-3 transition-opacity duration-300 opacity-0 group-hover:opacity-100"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                @endif
            </span>
        </button>
    @endunless
</th>
