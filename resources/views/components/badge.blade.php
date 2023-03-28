@props(['badge'])

@if (!empty($badge))
    @switch($badge)
        @case('active')
            <span
                class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">
                {{ str()->replace('_', ' ',str()->upper($badge)) }}
            </span>
        @break

        @case('pending')
        @case('blocked')
            <span
                class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">
                {{ str()->replace('_', ' ',str()->upper($badge)) }}
            </span>
        @break

        @case('inactive')
        @case('in-progress')
            <span
                class="bg-yellow-100 text-yellow-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">
                {{ str()->replace('_', ' ',str()->upper($badge)) }}
            </span>
        @break


        @case('approved')
            <span
                class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">
                {{ str()->replace('_', ' ',str()->upper($badge)) }}
            </span>
        @break

        @case('rejected')
            <span
                class="bg-purple-100 text-purple-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-purple-200 dark:text-purple-900">
                {{ str()->replace('_', ' ',str()->upper($badge)) }}
            </span>
        @break

    @endswitch
@endif