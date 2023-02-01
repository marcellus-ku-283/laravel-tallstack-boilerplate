<div>
    <x-breadcrumb :parentRoute="route('user.index')" :parentName="'Users'" :childName="'Add'" />

    <form wire:submit.prevent="save">
        <div class="p-6 mt-4 bg-white rounded-lg shadow">
            <div class="grid grid-cols-2 gap-4">
                <div class="w-full">
                    <x-input label="Name" id="name" name="name"  wire:model.defer="name" key="name"/>
                </div>
                <div class="w-full">
                    <x-input label="Email Address" id="email" name="email"  wire:model.defer="email" key="email"/>
                </div>
            </div>
            <div class="mt-4">
                <x-primary-button wire:loading  wire:target="save">Save</x-primary-button>
                <x-secondary-button type="button" wire:click="goBack">Back</x-secondary-button>
            </div>
        </div>
    </form>
</div>
