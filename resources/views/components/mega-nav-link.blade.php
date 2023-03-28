@props(['menu', 'open'])

<div x-data="{ isActive: false, open: @js($open) }">
    <div @click="$event.preventDefault(); open = !open"
        class="flex items-center p-2 transition-colors rounded-md text-primary-700 hover:text-white hover:bg-primary"
        role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
        <span aria-hidden="true">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $menu['icon-path'] }}" />
            </svg>
        </span>
        <span class="ml-2 text-sm md:text-md sm:text-sm lg:text-md"> {{ $menu['label'] }} </span>
        <span class="ml-auto" aria-hidden="true">
            <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </span>
    </div>
    <div role="menu" x-show="open" class="mt-2 ml-8 space-y-2" aria-label="Dashboards">
        @if (!empty($menu['childs']))
            @foreach ($menu['childs'] as $subMenu)
                <a href="{{ route($subMenu['routeName']) }}" role="menuitem" @class([
                    'block p-2 text-sm transition-colors duration-200 rounded-md hover:bg-primary hover:text-white',
                    'bg-primary text-white' =>
                        request()->routeIs($subMenu['routeName']) == true,
                    'text-primary-700' => request()->routeIs($subMenu['routeName']) == false,
                ])>
                    <span class="text-sm md:text-md sm:text-sm lg:text-md">{{ $subMenu['label'] }}</span>
                </a>
            @endforeach
        @endif
    </div>
</div>
