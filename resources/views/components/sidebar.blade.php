<div class="sticky hidden bg-white dark:border-primary-darker dark:bg-darker md:block" x-data="{
    openSidebar: localStorage.getItem('openSidebar') == 'true' ? true : false,
    init() {
        console.log(this.openSidebar)
    }
}"
    :class="{
        'sidebar-open': openSidebar == true,
        'sidebar-close': openSidebar == false,
    }">
    <div class="flex bg-primary">
        <a href="{{ route('dashboard') }}" class="m-auto">
            <div x-show="!openSidebar" class="h-16 py-2">
                <x-svg.small-logo primaryColor="black" secondaryColor="white" />
            </div>
            <div x-show="openSidebar">
                <x-application-logo class="h-16 w-44" />
            </div>
        </a>
    </div>
    <div class="flex flex-col max-h-screen py-4 space-y-2 overflow-auto">
        <nav x-show="!openSidebar" class="sticky top-0 w-16 px-2 space-y-2 divide-y-2">
            <div class="items-center space-y-2">
                @if (!empty(config('sidebar-menu')))
                    @foreach (config('sidebar-menu') as $menu)
                        @if ($menu['hasChild'])
                            @foreach ($menu['childs'] as $key => $subMenu)
                                <a @class([
                                    'flex items-center p-2 rounded-md justify-center space-x-2',
                                    'bg-primary-500 text-white' =>
                                        request()->routeIs($subMenu['routeName']) == true,
                                    'hover:bg-primary-500 hover:text-white  text-primary-700' =>
                                        request()->routeIs($subMenu['routeName']) == false,
                                ]) href="{{ route($subMenu['routeName']) }}"
                                    x-data="{ tooltip: '{{ $subMenu['label'] }}' }" x-tooltip="tooltip">
                                    <span aria-hidden="true">
                                        <svg @class(['w-5 h-5']) xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="{{ $subMenu['icon-path'] }}" />
                                        </svg>
                                    </span>
                                </a>
                            @endforeach
                        @else
                            <a @class([
                                'flex items-center p-2 rounded-md justify-center space-x-2',
                                'bg-primary-500 text-white' =>
                                    request()->routeIs($menu['routeName']) ||
                                    request()->routeIs($menu['genericRouteKey'] . '.*') == true,
                                'hover:bg-primary-500 hover:text-white  text-primary-700' =>
                                    request()->routeIs($menu['routeName']) ||
                                    request()->routeIs($menu['genericRouteKey'] . '.*') == false,
                            ]) href="{{ route($menu['routeName']) }}"
                                x-data="{ tooltip: '{{ $menu['label'] }}' }" x-tooltip="tooltip">
                                <span aria-hidden="true">
                                    <svg @class(['w-5 h-5']) xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="{{ $menu['icon-path'] }}" />
                                    </svg>
                                </span>
                            </a>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="py-2 space-y-2">
                <a @class([
                    'flex items-center p-2 rounded-md justify-center space-x-2',
                    'bg-primary-500 text-white' => request()->routeIs('profile.show') == true,
                    'hover:bg-primary-500 hover:text-white  text-primary-700' =>
                        request()->routeIs('profile.show') == false,
                ]) href="{{ route('profile.show') }}" x-data="{ tooltip: 'Profile' }"
                    x-tooltip="tooltip">
                    <span aria-hidden="true">
                        <x-svg.profile />
                    </span>
                </a>
                <a @class([
                    'flex items-center p-2 rounded-md justify-center space-x-2',
                    'bg-primary-500 text-white' =>
                        request()->routeIs('change-password') == true,
                    'hover:bg-primary-500 hover:text-white  text-primary-700' =>
                        request()->routeIs('change-password') == false,
                ]) href="{{ route('change-password') }}" x-data="{ tooltip: 'Change Password' }"
                    x-tooltip="tooltip">
                    <span aria-hidden="true">
                        <x-svg.lock />
                    </span>
                </a>
                <a @class([
                    'flex items-center p-2 rounded-md justify-center space-x-2',
                    'bg-primary-500 text-white' => request()->routeIs('2-factor-auth') == true,
                    'hover:bg-primary-500 hover:text-white  text-primary-700' =>
                        request()->routeIs('2-factor-auth') == false,
                ]) href="{{ route('2-factor-auth') }}" x-data="{ tooltip: '2 Factor Authentication' }"
                    x-tooltip="tooltip">
                    <span aria-hidden="true">
                        <x-svg.key />
                    </span>
                </a>
                <a @class([
                    'flex items-center p-2 rounded-md justify-center space-x-2',
                    'bg-primary-500 text-white' =>
                        request()->routeIs('browser-sessions') == true,
                    'hover:bg-primary-500 hover:text-white  text-primary-700' =>
                        request()->routeIs('browser-sessions') == false,
                ]) href="{{ route('browser-sessions') }}" x-data="{ tooltip: 'Browser Sessions' }"
                    x-tooltip="tooltip">
                    <span aria-hidden="true">
                        <x-svg.computer-desktop />
                    </span>
                </a>
                <a class="flex items-center justify-center p-2 space-x-2 rounded-md text-primary-700 hover:bg-primary hover:text-white"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    x-data="{ tooltip: 'Sign out' }" x-tooltip="tooltip">
                    <span aria-hidden="true">
                        <x-svg.logout />
                    </span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="py-2 space-y-2">
                <div @class([
                    'flex m-auto items-center p-2 rounded-md justify-center space-x-2 text-white hover:bg-primary hover:text-white text-primary-700',
                ]) x-data="{ tooltip: 'Slide right' }" x-tooltip="tooltip"
                    @click="openSidebar = !openSidebar; localStorage.setItem('openSidebar', true);">
                    <span aria-hidden="true">
                        <x-svg.arrow-right-on-rectangle />
                    </span>
                </div>
            </div>
        </nav>
        <nav x-show="openSidebar" class="sticky top-0 w-full px-2 space-y-2 divide-y-2">
            <div class="space-y-2">
                @if (!empty(config('sidebar-menu')))
                    @foreach (config('sidebar-menu') as $menu)
                        @if ($menu['hasChild'])
                            <x-mega-nav-link :menu="$menu" :open="request()->routeIs($menu['genericRouteKey'] . '.*')">
                            </x-mega-nav-link>
                        @else
                            <x-nav-link href="{{ route($menu['routeName']) }}" :active="request()->routeIs($menu['routeName']) ||
                                request()->routeIs($menu['genericRouteKey'] . '.*')">
                            </x-nav-link>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="py-2 space-y-2">
                @php
                    $open = false;
                    switch (true) {
                        case request()->routeIs('profile.show'):
                            $open = true;
                            break;
                        case request()->routeIs('change-password'):
                            $open = true;
                            break;
                        case request()->routeIs('2-factor-auth'):
                            $open = true;
                            break;
                        case request()->routeIs('browser-sessions'):
                            $open = true;
                            break;
                        default:
                            $open = false;
                            break;
                    }
                @endphp
                <div x-data="{
                    open: '{{ $open }}',
                }" class="space-y-2">
                    <div class="flex items-center justify-between p-2 space-x-2 bg-white rounded-md text-primary-700 hover:text-white hover:bg-primary"
                        @click="open = !open">
                        <div class="flex items-start space-x-2">
                            <x-svg.profile />
                            <span>{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</span>
                        </div>
                        <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>

                    </div>
                    <div x-show="open">
                        <div class="space-y-2">
                            <a @class([
                                'block p-2 text-sm transition-colors duration-200 rounded-md hover:bg-primary hover:text-white mt-2 ml-8 space-y-2',
                                'bg-primary text-white' => request()->routeIs('profile.show') == true,
                                'hover:bg-primary-500 hover:text-white  text-primary-700' =>
                                    request()->routeIs('profile.show') == false,
                            ]) href="{{ route('profile.show') }}">
                                <span>{{ __('Profile') }}</span>
                            </a>
                            <a @class([
                                'block p-2 text-sm transition-colors duration-200 rounded-md hover:bg-primary hover:text-white mt-2 ml-8 space-y-2',
                                'bg-primary text-white' => request()->routeIs('change-password') == true,
                                'hover:bg-primary-500 hover:text-white  text-primary-700' =>
                                    request()->routeIs('change-password') == false,
                            ]) href="{{ route('change-password') }}">
                                <span>{{ __('Change Password') }}</span>
                            </a>
                            <a @class([
                                'block p-2 text-sm transition-colors duration-200 rounded-md hover:bg-primary hover:text-white mt-2 ml-8 space-y-2',
                                'bg-primary text-white' => request()->routeIs('2-factor-auth') == true,
                                'hover:bg-primary-500 hover:text-white  text-primary-700' =>
                                    request()->routeIs('2-factor-auth') == false,
                            ]) href="{{ route('2-factor-auth') }}">
                                <span>{{ __('2 Factor Authentication') }}</span>
                            </a>
                            <a @class([
                                'block p-2 text-sm transition-colors duration-200 rounded-md hover:bg-primary hover:text-white mt-2 ml-8 space-y-2',
                                'bg-primary text-white' => request()->routeIs('browser-sessions') == true,
                                'hover:bg-primary-500 hover:text-white  text-primary-700' =>
                                    request()->routeIs('browser-sessions') == false,
                            ]) href="{{ route('browser-sessions') }}">
                                <span>{{ __('Browser Sessions') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <a class="flex items-center justify-start p-2 space-x-2 rounded-md hover:bg-primary-500 hover:text-white text-primary-700"href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span aria-hidden="true">
                        <x-svg.logout />
                    </span>
                    <span>{{ __('Sign out') }}</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
                    {{ csrf_field() }}
                </form>
            </div>
            <div class="py-2 space-y-2">
                <div @click="openSidebar = !openSidebar; localStorage.setItem('openSidebar', false)"
                    class="flex items-center justify-start p-2 space-x-2 rounded-md hover:bg-primary-500 hover:text-white text-primary-700 hover:cursor-pointer">
                    <span aria-hidden="true">
                        <x-svg.arrow-left-on-rectangle />
                    </span>
                    <span>{{ __('Slide left') }}</span>
                </div>
            </div>
        </nav>
    </div>
</div>
