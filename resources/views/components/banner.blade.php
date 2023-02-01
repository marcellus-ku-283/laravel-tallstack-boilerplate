<div class="fixed top-4 right-10">
    @switch(true)
        @case(session()->has('flash.success'))
            <div class="hide-toast">
                <div class="flex px-4 py-3 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
                    <span class="block sm:inline">{{ session()->get('flash.success') ?? 'This is message' }}</span>
                </div>
            </div>
        @break

        @case(session()->has('flash.info'))
            <div class="hide-toast">
                <div class="flex px-4 py-3 text-yellow-700 bg-yellow-100 border border-yellow-400 rounded" role="alert">
                    <span class="block sm:inline">{{ session()->get('flash.info') ?? 'This is message' }}</span>
                </div>
            </div>
        @break

        @case(session()->has('flash.danger'))
            <div class="hide-toast">
                <div class="flex px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                    <span class="block sm:inline">{{ session()->get('flash.danger') ?? 'This is message' }}</span>
                </div>
            </div>
        @break

        @case(session()->has('flash.warn'))
            <div class="hide-toast">
                <div class="flex px-4 py-3 text-blue-700 bg-blue-100 border border-blue-400 rounded" role="alert">
                    <span class="block sm:inline">{{ session()->get('flash.warn') ?? 'This is message' }}</span>
                </div>
            </div>
        @break
    @endswitch
</div>
