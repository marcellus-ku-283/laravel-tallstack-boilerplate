<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Profile') }}
        </h2>
    </x-slot>


    <div class="flex items-center justify-between">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Change Password') }}
        </h2>
    </div>

    <div class="grid grid-cols-1 gap-0 mt-4">
        <div class="w-full p-4 bg-white border-b border-gray-200 shadow-xl sm:rounded-lg">
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>