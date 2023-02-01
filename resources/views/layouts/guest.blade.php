<x-base-layout>
    <div class="flex">
        <div class="w-1/2 min-h-screen col-span-1 bg-primary">
            <div class="flex items-center justify-center h-screen ">
                <a href="{{ route('login') }}">
                    <x-application-logo class="h-40"></x-application-logo>
                </a>
            </div>
        </div>
        <div class="w-1/2 min-h-screen col-span-1 bg-white">
            {{ $slot }}
        </div>
    </div>
</x-base-layout>
