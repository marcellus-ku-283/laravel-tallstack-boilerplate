<div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full p-6 m-4 overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
