<div class="flex flex-col items-center min-h-screen px-8 pt-6 bg-gray-100 sm:px-4 sm:justify-center sm:pt-0 dark:bg-slate-800">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-lg dark:bg-slate-700 dark:shadow-2xl">
        {{ $slot }}
    </div>
</div>
