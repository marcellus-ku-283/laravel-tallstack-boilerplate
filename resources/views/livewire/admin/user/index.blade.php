<div>

    <x-breadcrumb :parentRoute="route('user.index')" :parentName="'Users'" :childName="'List'" :addRoute="route('user.add')" />

    <x-table :isSearch="true" :hasFilters="false">
        <x-slot name="search">
            <x-table.search :wireKey="'search'" :label="'Search user'" />
        </x-slot>

        <x-slot name="head">
            <x-table.heading sortable wire:click="sortBy('name')" :direction="$sortField == 'name' ? $sortDirection : null">
                Name
            </x-table.heading>
            <x-table.heading>Email</x-table.heading>
            <x-table.heading sortable wire:click="sortBy('status')" :direction="$sortField == 'created_at' ? $sortDirection : null">
                Status
            </x-table.heading>
            <x-table.heading sortable wire:click="sortBy('created_at')" :direction="$sortField == 'created_at' ? $sortDirection : null">
                Created On
            </x-table.heading>
            <x-table.heading>
            </x-table.heading>
        </x-slot>

        <x-slot name="body">
            @if ($users->isNotEmpty())
                @foreach ($users as $user)
                    <x-table.row>
                        <x-table.cell>{{ $user->name }}</x-table.cell>
                        <x-table.cell>{{ $user->email }}</x-table.cell>
                        <x-table.cell>
                            <x-badge :badge="$user->status" />
                        </x-table.cell>
                        <x-table.cell>
                            {{ !empty($user->created_at) ? $user->created_at->diffForHumans() : '-' }}
                        </x-table.cell>
                        <x-table.cell>
                            <x-action :model="$user" :route="'user'" :deleteClick="'confirmDelete'" />
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            @else
                <x-table.row>
                    <x-table.cell colspan="5" class="text-center">No data found.</x-table.cell>
                </x-table.row>
            @endif
        </x-slot>

        <x-slot name="pagination">
            {{ $users->links() }}
        </x-slot>
    </x-table>


    <x-jet-dialog-modal wire:model="dialogModel">
        <x-slot name="title">
            {{ __('Confirmation') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure want to remove this item?') }}
        </x-slot>

        <x-slot name="footer">
            <div class="space-x-2">
                <x-secondary-button wire:click="deleteUser({{ $deleteId }})" wire:loading.attr="disabled">
                    {{ __('Confirm') }}
                </x-secondary-button>
                <x-primary-button wire:click="closeConfirm" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-primary-button>
            </div>

        </x-slot>
    </x-jet-dialog-modal>
</div>
