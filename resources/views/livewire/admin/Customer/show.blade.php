<div>
    <div class="flex items-center justify-between">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Customer Detail') }}
        </h2>
    </div>

    <div class="py-0 mt-4 bg-white divide-y-2 rounded-lg shadow dark:bg-slate-700 dark:text-white">
        <div class="p-4 px-4">
            <span class="text-2xl">Customer Information</span>
        </div>
        <div class="alter-bg">
            <x-show-item :label="'Mambu - ID'" :value="$user->momentum_id ?? 'NA'" />
            <x-show-item :label="'Mambu - User endcoded key'" :value="$user->momentum_user_key ?? 'NA'" />
            <x-show-item :label="'Firstname'" :value="$user->first_name" />
            <x-show-item :label="'Lastname'" :value="$user->last_name" />
            <x-show-item :label="'Email'" :value="$user->email" />
            {{-- <x-show-item :label="'Status'" :value="$user->status" /> --}}
            <x-show-item :label="'Created On'" :value="$user->created_at->diffForHumans()" />
        </div>
    </div>

    <div class="float-right pb-8 mt-4">
        <x-secondary-button type="button" wire:click="goBack">Back</x-secondary-button>
    </div>
</div>
