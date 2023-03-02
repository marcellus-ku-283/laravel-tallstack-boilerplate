<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-white">
            {{ __('Profile') }}
        </h2>
    </x-slot>


    <div class="flex items-center justify-between">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-white">
            {{ __('2 Factor Authencation') }}
        </h2>
    </div>

    <div class="grid grid-cols-1 gap-0 mt-4">
        <div class="w-full p-6 bg-white shadow-xl sm:px-8 sm:rounded-lg dark:bg-slate-700 dark:text-white">
            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
