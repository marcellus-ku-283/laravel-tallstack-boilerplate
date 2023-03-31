<div>
    <div class="space-y-4 divide-y-2">
        <div class="flex justify-between">
            <a href="{{ route('developer.dashboard') }}">
                <x-application-logo :color="'#D4AD60'" class="h-10 sm:h-10"></x-application-logo>
                <span class="font-semibold text-gray-600">For Developers</span>
            </a>
            <a href="{{ route('developer.logout') }}" class="flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out border border-transparent rounded-md bg-primary hover:bg-primary-700 focus:bg-primary-700 active:bg-primary-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                Logout
            </a>
        </div>

        <div class="grid grid-cols-2 gap-4 pt-4">
            <div class="w-full p-4 text-center rounded-lg shadow-lg bg-primary-200 hover:cursor-pointer">
                <a href="/telescope" terget="_blank">
                    <span class="text-lg font-bold text-primary">Telescope</span>
                </a>
            </div>

            <div class="w-full p-4 text-center rounded-lg shadow-lg bg-primary-200 hover:cursor-pointer">
                <a href="/log-viewer" terget="_blank">
                    <span class="text-lg font-bold text-primary">Log Viewer</span>
                </a>
            </div>
        </div>
    </div>
</div>
