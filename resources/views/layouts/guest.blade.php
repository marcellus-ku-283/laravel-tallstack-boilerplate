<x-base-layout>
    <div class="md:flex">
        <div class="hidden w-1/2 min-h-screen col-span-1 bg-gradient-to-r from-primary-700 to-primary-300 md:block">
            <div class="flex items-center justify-center h-screen">
                <a href="{{ route('login') }}">
                    <x-application-logo class="h-40 sm:h-20"></x-application-logo>
                    @if(
                        request()->routeIs('developer.*') == true ||
                        request()->routeIs('telescope.*') == true ||
                        request()->routeIs('log-viewer.*') == true)
                        <span class="font-semibold text-white">For Developers</span>    
                    @endif  
                </a>
            </div>
        </div>
        <div
            class="flex items-center w-full md:hidden sm:block bg-primary">
            <a href="{{ route('login') }}" class="flex items-center justify-center m-auto">
                <x-application-logo class="py-2 w-44"></x-application-logo>
            </a>
        </div>
        <div class="w-full min-h-screen col-span-1 bg-white md:w-1/2 lg:w-1/2">
            {{ $slot }}
        </div>
    </div>
</x-base-layout>