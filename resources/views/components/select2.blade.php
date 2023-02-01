<div wire:ignore x-data="{
    model: @entangle($attributes->wire('model')),
}" x-init="select2 = $($refs.select)
    
    .select2({
        dropdownAutoWidth: true,
        width: '100%',
        minimumResultsForSearch: 10,
    });
select2.on('select2:select', (event) => {
    model = Array.from(event.target.options).filter(option => option.selected).map(option => option.value);
});
select2.on('select2:unselect', (event) => {
    model = Array.from(event.target.options).filter(option => option.selected).map(option => option.value);
});
$watch('model', (value) => {
    select2.val(value).trigger('change');
});" >
    <select x-ref="select"
        {{ $attributes->merge(['class' => 'select2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5']) }}>
        {{ $slot }}
    </select>
</div>

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function() {
            $('.select2').select2()
        })
    </script>
@endpush
