<div class="sticky hidden w-3/12 bg-white dark:border-primary-darker dark:bg-darker md:block">
    <div class="flex bg-primary">
        <a href="{{ route('dashboard') }}" class="m-auto">
            <x-application-logo class="h-16 w-44" />
        </a>
    </div>
    <div class="flex flex-col max-h-screen py-4 space-y-2 overflow-auto">
        <nav class="sticky top-0 px-2 space-y-2 divide-y-2 ">
            <div class="py-2 space-y-2">
                @if (!empty(config('sidebar-menu')))
                    @foreach (config('sidebar-menu') as $menu)
                        @if ($menu['hasChild'])
                            <x-mega-nav-link :menu="$menu" :open="request()->routeIs($menu['genericRouteKey'] . '.*')">
                            </x-mega-nav-link>
                        @else
                            <x-jet-nav-link href="{{ route($menu['routeName']) }}" :menu="$menu" :active="request()->routeIs($menu['routeName']) ||
                                request()->routeIs($menu['genericRouteKey'] . '.*')">
                            </x-jet-nav-link>
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
                        <div x-show="open">
                            <x-svg.down-arrow />
                        </div>
                        <div x-show="!open">
                            <x-svg.right-arrow />
                        </div>

                    </div>
                    <div x-show="open">
                        <div class="space-y-2">
                            <a @class([
                                'flex items-center p-2 ml-10 pl-4 rounded-md justify-start space-x-2',
                                'bg-primary-500 text-white' => request()->routeIs('profile.show') == true,
                                'hover:bg-primary-500 hover:text-white  text-primary-700' =>
                                    request()->routeIs('profile.show') == false,
                            ]) href="{{ route('profile.show') }}">
                                <span>{{ __('Profile') }}</span>
                            </a>
                            <a @class([
                                'flex items-center p-2 ml-10 pl-4 rounded-md justify-start space-x-2',
                                'bg-primary-500 text-white' =>
                                    request()->routeIs('change-password') == true,
                                'hover:bg-primary-500 hover:text-white  text-primary-700' =>
                                    request()->routeIs('change-password') == false,
                            ]) href="{{ route('change-password') }}">
                                <span>{{ __('Change Password') }}</span>
                            </a>
                            <a @class([
                                'flex items-center p-2 ml-10 pl-4 rounded-md justify-start space-x-2',
                                'bg-primary-500 text-white' => request()->routeIs('2-factor-auth') == true,
                                'hover:bg-primary-500 hover:text-white  text-primary-700' =>
                                    request()->routeIs('2-factor-auth') == false,
                            ]) href="{{ route('2-factor-auth') }}">
                                <span>{{ __('2 Factor Authentication') }}</span>
                            </a>
                            <a @class([
                                'flex items-center p-2 ml-10 pl-4 rounded-md justify-start space-x-2',
                                'bg-primary-500 text-white' =>
                                    request()->routeIs('browser-sessions') == true,
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
</div>