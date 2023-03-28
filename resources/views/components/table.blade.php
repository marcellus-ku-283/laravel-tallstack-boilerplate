@props([
    'isSearch' => false,
    'hasFilters' => false,
    'color' => 'indigo',
])

<div x-data="{
    openFilterDrawer: false
}">
    <div class="overflow-hidden bg-transparent sm:rounded-lg">
        <div class="py-4">
            <div class="flex justify-between space-x-3">
                <div class="w-full">
                    <div class="flex flex-col justify-between p-4 space-y-4 bg-white divide-y-2 rounded-lg">
                        <div class="flex justify-between w-full space-x-4">
                            @if ($isSearch)
                                <div class="w-full">
                                    {{ $search }}
                                </div>
                            @endif

                            @if ($hasFilters)
                                <div class="grid justify-items-end">
                                    <button class="border border-transparent rounded-md bg-primary "
                                        x-on:click="openFilterDrawer = !openFilterDrawer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 m-2 text-white">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                                        </svg>
                                    </button>
                                </div>
                            @endif
                        </div>
                        <div x-show="openFilterDrawer" class="flex flex-col justify-between py-4 space-y-4">
                            <div class="grid grid-cols-3 gap-4">
                                <div class="w-full">
                                    {{ $filters ?? '' }}
                                </div>
                            </div>
                            <div class="grid grid-cols-4 gap-4">
                                @if (empty($clearFilter))
                                    <div class="w-full">
                                        <button
                                            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md bg-primary hover:bg-primary-700 focus:bg-primary-700 active:bg-primary-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"
                                            type="button" x-on:click="openFilterDrawer = false">Close</button>
                                    </div>
                                @else
                                    <div class="w-full">
                                        {{ $clearFilter ?? '' }}
                                    </div>
                                    <div class="w-full">
                                        <button
                                            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md bg-primary hover:bg-primary-700 focus:bg-primary-700 active:bg-primary-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"
                                            type="button" x-on:click="openFilterDrawer = false">Close</button>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div>
                        <div
                            class="mt-6 mb-4 overflow-auto shadow ring-1 ring-black ring-opacity-5 md:mx-0 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
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
                    </div>
                    <div class="mt-2">
                        {{ $pagination }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
