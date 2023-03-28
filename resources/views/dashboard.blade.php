<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-between">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </div>

    <div class="grid grid-cols-1 gap-4 mt-4">
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            <x-welcome />
        </div>
    </div>
</x-app-layout>
