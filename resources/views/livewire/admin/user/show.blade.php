<div>
    <x-breadcrumb :parentRoute="route('user.index')" :parentName="'Users'" :childName="'Detail'" />

    <div class="py-0 mt-4 bg-white rounded-lg shadow">
        <div class="alter-bg">
            <x-show-item :label="'Name'" :value="$user->name" />
            <x-show-item :label="'Email'" :value="$user->email" />
            <x-show-item :label="'Status'" :value="$user->status" />
            <x-show-item :label="'Created On'" :value="$user->created_at->diffForHumans()" />
        </div>

    </div>

    <div class="float-right mt-4">
        <x-primary-button wire:click="goToEdit">Edit</x-primary-button>
        <x-secondary-button type="button" wire:click="goBack">Back</x-secondary-button>
    </div>
</div>
