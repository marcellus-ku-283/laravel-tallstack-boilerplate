@props([
    'case' => null,
    'label',
    'value',
    'link'
])
<dl class="sm:divide-y sm:divide-gray-200">


    @switch($case)
        @case('link')
            <div class="py-4 pl-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:pl-4 lg:pl-4 md:pl-4">
                <dt class="text-sm font-bold">{{ $label }}</dt>
                <dd class="mt-1 text-sm font-medium sm:mt-0 sm:col-span-2">
                    <a class="text-blue-500 underline" href="{{ $link }}">{{ $value }}</a> 
                </dd>
            </div>
        @break

        @case('status')
            <div class="py-4 pl-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:pl-4 lg:pl-4 md:pl-4">
                <dt class="text-sm font-bold">{{ $label }}</dt>
                <dd class="mt-1 text-sm font-medium sm:mt-0 sm:col-span-2">
                    <x-badge badge="{{ $value }}"/>
                </dd>
            </div>
        @break

        $@default
            <div class="py-4 pl-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:pl-4 lg:pl-4 md:pl-4">
                <dt class="text-sm font-bold">{{ $label }}</dt>
                <dd class="mt-1 text-sm font-medium sm:mt-0 sm:col-span-2">{{ $value }}</dd>
            </div>
    @endswitch

</dl>
