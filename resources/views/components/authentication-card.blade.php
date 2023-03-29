<div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
    <div class="mx-2">
        <div>
            {{ $logo }}
        </div>

        <div class="w-full p-6 overflow-hidden bg-white rounded-lg shadow-md">
            {{ $slot }}
        </div>
    </div>

</div>
