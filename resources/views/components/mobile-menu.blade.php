<div class="px-4 py-4 overflow-auto bg-gray-100 md:py-6 md:px-12 md:hidden lg:hidden xl:hidden" x-data="{ openMenu: false }"
    :class="openMenu ? 'overflow-hidden' : 'overflow-visible'">
    <button class="text-white align-middle" @click="openMenu = !openMenu">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-primary" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
    <div class="fixed top-0 bottom-0 left-0 right-0 z-10 backdrop-blur-md" :class="openMenu ? 'visible' : 'invisible'"
        x-cloak>
        <div class="absolute top-0 bottom-0 left-0 z-10 w-2/4 h-screen overflow-auto transition-all bg-white drop-shadow-2xl"
            :class="openMenu ? '-translate-x-0' : '-translate-x-full'">
            <div class="flex bg-primary">
                <a href="{{ route('dashboard') }}" class="m-auto">
                    <div class="py-2 bg-primary">
                        <x-application-logo class="h-16 w-44 xs:h-4" />
                    </div>
                </a>
            </div>
            <nav class="sticky top-0 w-full px-2 py-2 space-y-2 divide-y-2">
                <div class="space-y-2">
                    @if (!empty(config('sidebar-menu')))
                        @foreach (config('sidebar-menu') as $menu)
                            @if ($menu['hasChild'])
                                <x-mega-nav-link :menu="$menu" :open="request()->routeIs($menu['genericRouteKey'] . '.*')">
                                </x-mega-nav-link>
                            @else
                                <x-nav-link href="{{ route($menu['routeName']) }}"
                                    :active="request()->routeIs($menu['routeName']) ||
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
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
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

            </nav>
        </div>
        <button class="absolute top-0 bottom-0 left-0 right-0 text-white" @click="openMenu = !openMenu">
            <svg xmlns="http://www.w3.org/2000/svg" class="absolute w-6 h-6 top-2 right-2 text-primary" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>
