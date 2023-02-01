<x-base-layout>
    <div class="flex items-start pt-6 sm:pt-0">
        <aside class="sticky hidden w-64 bg-white border-r dark:border-primary-darker dark:bg-darker md:block">
            <div class="flex bg-primary">
                <a href="{{ route('dashboard') }}" class="m-auto">
                    <x-application-logo class="py-2 w-44"></x-application-logo>
                </a>
            </div>
            <x-sidebar></x-sidebar>
        </aside>
        <main class="sticky top-0 w-full h-screen px-12 py-6 overflow-auto bg-gray-100">
            {{ $slot }}
        </main>
    </div>
</x-base-layout>
