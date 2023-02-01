<div class="flex flex-col max-h-screen px-2 py-4 space-y-2 overflow-auto divide-y-2 ">
    <nav class="sticky top-0 px-2 space-y-2">
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
    </nav>

    <div class="fixed bottom-0 py-2 bg-white h-14 w-[200px]" x-data="{
        open: false
    }">
        <div x-show="open" class="fixed w-[185px] mx-2 mb-4 divide-y rounded shadow divide-primary-700 bg-primary bottom-14">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                <li>
                    <a href="{{ route('profile.show') }}"
                        class="block px-4 py-2 hover:bg-white hover:text-primary">Profile</a>
                </li>
                <li>
                    <a class="block px-4 py-2 hover:bg-white hover:text-primary"href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sign out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>

        <div class="flex px-6 space-x-4  w-[195px]" @click="open = !open">
            @if (empty(auth()->user()->getProfileUrl(auth()->user()->profile_photo_path)
                ))
                <div class="w-10 h-10 p-2 text-center text-white rounded-full bg-primary"></div>
                <span>{{ auth()->user()->getShortName() }}</span>
            @else
                <img class="w-10 h-10 text-center rounded-full"
                    src="{{ auth()->user()->getProfileUrl(auth()->user()->profile_photo_path) }}" />
            @endif

            <div class="flex items-center text-primary-700">
                <div class="hover:cursor-pointer"><span>{{ auth()->user()->name }}</span></div>
            </div>
        </div>
    </div>
</div>
