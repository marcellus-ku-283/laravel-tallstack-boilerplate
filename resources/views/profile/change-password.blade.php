<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-white">
            {{ __('Profile') }}
        </h2>
    </x-slot>


    <div class="flex items-center justify-between">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-white">
            {{ __('Change Password') }}
        </h2>
    </div>

    <div class="grid grid-cols-1 gap-0 mt-4">
        <div class="w-full p-6 bg-white shadow-xl sm:px-8 sm:rounded-lg dark:bg-slate-700">
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
