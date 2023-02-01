@props(['label', 'inputAttrs', 'key', 'defer' => false, 'disabled' => false])

<div class="space-y-2">
    <x-jet-label for="{{ $label }}">{{ str()->ucfirst($label) }}</x-jet-label>

    @if ($defer == true)
        <select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
            'class' =>
                'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5',
        ]) !!} wire:model.defer='{{ $key }}' id="{{ $key }}" name="{{ $key }}" >
            {{ $slot }}
        </select>
    @endif
</div>

@error($key)
    <span class="mt-2 text-sm font-medium text-red-400">{{ $message }}</span>
@enderror
