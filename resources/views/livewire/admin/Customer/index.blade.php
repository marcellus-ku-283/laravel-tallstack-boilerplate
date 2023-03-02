<div>

    <div class="flex items-center justify-between">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Customer List') }}
        </h2>
    </div>

    <x-table :isSearch="true" :hasFilters="false">
        <x-slot name="search">
            <x-table.search :wireKey="'search'" :label="'Search user'" />
        </x-slot>

        <x-slot name="head">
            <x-table.heading sortable wire:click="sortBy('name')" :direction="$sortField == 'name' ? $sortDirection : null">
                Name
            </x-table.heading>
            <x-table.heading>Phone</x-table.heading>
            <x-table.heading>Email</x-table.heading>
            <x-table.heading>Balance</x-table.heading>
            <x-table.heading>Blocked</x-table.heading>
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
                        <x-table.cell>{{ $user->first_name . ' ' . $user->last_name }}</x-table.cell>
                        <x-table.cell>+ {{ $user->phone }}</x-table.cell>
                        <x-table.cell>{{ $user->email }}</x-table.cell>
                        <x-table.cell>{{ formatPrice($user->balance) }}</x-table.cell>
                        <x-table.cell>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input wire:click="updateBlockStatusForUser({{ $user->id }})" type="checkbox"
                                    @checked($user->block) class="sr-only peer">
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 dark:peer-focus:ring-primary-800 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-600">
                                </div>
                            </label>
                        </x-table.cell>
                        <x-table.cell>
                            {{ $user->created_at->diffForHumans() }}
                        </x-table.cell>
                        <x-table.cell>
                            <a href="{{ route('customer.show', $user->id) }}"
                                class="inline-flex text-sm font-semibold tracking-widest uppercase transition duration-150 ease-in-out border border-transparent rounded-md items-centerpy-2 text-primary"
                                x-data="{ tooltip: 'View user' }" x-tooltip="tooltip">
                                <x-svg.eye />
                            </a>
                            <button type="button" wire:click="confirmDelete({{ $user->id }})"
                                class="inline-flex text-sm font-semibold tracking-widest uppercase transition duration-150 ease-in-out border border-transparent rounded-md items-centerpy-2 text-primary"
                                x-data="{ tooltip: 'Delete user' }" x-tooltip="tooltip">
                                <x-svg.trash/>
                            </button>
                            <a href="{{ route('customer.loan.index', $user->id) }}"
                                class="inline-flex text-sm font-semibold tracking-widest uppercase transition duration-150 ease-in-out border border-transparent rounded-md items-centerpy-2 text-primary"
                                x-data="{ tooltip: 'View loans' }" x-tooltip="tooltip">
                                <x-svg.money />
                            </a>
                        </x-table.cell>
                    </x-table.row>
                @endforeach
            @else
                <x-table.row>
                    <x-table.cell colspan="7" class="text-center">No data found.</x-table.cell>
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
