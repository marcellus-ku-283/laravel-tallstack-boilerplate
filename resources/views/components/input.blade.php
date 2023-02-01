@props(['key', 'label'])

<div class="space-y-2">
    <x-jet-label for="{{ $label }}">{{ str()->ucfirst($label) }}</x-jet-label>
    <x-jet-input {{ $attributes }}/>
</div>

@error($key)
    <span class="mt-2 text-sm font-medium text-red-400">{{ $message }}</span>
@enderror
