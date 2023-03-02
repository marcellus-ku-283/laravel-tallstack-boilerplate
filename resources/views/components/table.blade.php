@props([
    'isSearch' => false,
    'hasFilters' => false,
    'color' => 'indigo',
])

<div x-data="{
    openFilterDrawer: false
}">
    <div class="overflow-hidden sm:rounded-lg">
        <div class="grid grid-cols-1 gap-4">
            <div class="w-full">
                <div class="flex justify-between space-x-3">
                    <div class="w-full space-y-6" x-transition.duration.5000ms
                        x-transition:enter="transition ease-out-in duration-5000"
                        x-transition:enter-start="opacity-0 transform scale-x-100 translate-x-0"
                        x-transition:enter-end="opacity-100 transform scale-x-0 -translate-x-1/2"
                        x-transition:leave="transition ease-out-in duration-5000"
                        x-transition:leave-start="opacity-100 transform scale-x-0 -translate-x-1/2"
                        x-transition:leave-end="opacity-0 transform scale-x-100 translate-x-0">
                        <div @class([
                            'p-4 mt-4 bg-white rounded-lg' => $isSearch || $hasFilters,
                        ])>
                            <div class="flex items-start justify-between space-x-4">
                                @if ($isSearch)
                                    {{ $search }}
                                @endif

                                @if ($hasFilters)
                                    <button class="border border-transparent rounded-md bg-primary-500 "
                                        x-on:click="openFilterDrawer = !openFilterDrawer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 m-2 text-white">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                                        </svg>
                                    </button>
                                @endif
                            </div>

                            <div class="mt-4 space-y-4" x-show="openFilterDrawer">
                                <div class="w-full">
                                    <x-jet-label for="filters" class="text-lg font-semibold text-gray-900">Filters
                                    </x-jet-label>
                                </div>
                                <div class="grid grid-cols-3 gap-4">
                                    {{ $filters ?? null }}
                                </div>
                                <div class="grid grid-cols-6 gap-4">
                                    {{ $clearFilter ?? null }}
                                </div>
                            </div>

                        </div>

                        <div class="overflow-scroll rounded-lg shadow">
                            <table class="w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        {{ $head }}
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    {{ $body }}
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-2">
                            {{ $pagination }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
