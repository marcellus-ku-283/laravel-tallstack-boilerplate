<x-base-layout>
    <x-loading-indicator />

    <div class="items-start md:flex sm:pt-0">
        <x-menu></x-menu>
        <main class="sticky top-0 w-full h-screen px-4 py-4 overflow-auto bg-gray-100 md:py-6 md:px-12 dark:bg-slate-800">
            {{ $slot }}
        </main>
    </div>
</x-base-layout>
