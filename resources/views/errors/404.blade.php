@if (auth()->check())
    <x-base-layout>
        <div class="flex items-start pt-6 sm:pt-0">
            <aside class="sticky hidden w-64 bg-white border-r dark:border-primary-darker dark:bg-darker md:block">
                <div class="flex bg-primary">
                    <a href="{{ route('dashboard') }}" class="m-auto">
                        <x-application-logo class="py-2 w-44"></x-application-logo>
                    </a>
                </div>
                <x-sidebar></x-sidebar>
            </aside>
            <main class="sticky top-0 w-full h-screen px-12 py-6 overflow-auto bg-gray-100">
                <section class="flex items-center h-full p-16 dark:bg-gray-900 dark:text-gray-100">
                    <div class="container flex flex-col items-center justify-center px-5 mx-auto my-8">
                        <div class="max-w-md text-center">
                            <h2 class="mb-8 font-extrabold text-9xl dark:text-gray-600">
                                <span class="sr-only">Error</span>404
                            </h2>
                            <p class="text-2xl font-semibold md:text-3xl">Sorry, we couldn't find this page.</p>
                            <p class="mt-4 mb-8 dark:text-gray-400">But dont worry, you can find plenty of other things
                                on our homepage.</p>
                            <a rel="noopener noreferrer" href="#"
                                class="px-8 py-3 font-semibold rounded dark:bg-violet-400 dark:text-gray-900">Back to
                                homepage</a>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </x-base-layout>
@else
    <x-base-layout>
        <div class="flex">
            <div class="w-1/2 min-h-screen col-span-1 bg-primary">
                <div class="flex items-center justify-center h-screen ">
                    <a href="{{ route('login') }}">
                        <x-application-logo class="h-40"></x-application-logo>
                    </a>
                </div>
            </div>
            <div class="w-1/2 min-h-screen col-span-1 bg-white text-primary-300">
                <x-jet-authentication-card>
                    <x-slot name="logo"></x-slot>
                    <div class="max-w-md text-center space-y-4">
                        <h2 class="mb-8 font-extrabold text-9xl dark:text-gray-600">
                            <span class="sr-only">Error</span>404
                        </h2>
                        <p class="text-2xl font-semibold md:text-3xl">Sorry, we couldn't find this page.</p>
                        <a rel="noopener noreferrer" href="{{ route('login') }}"
                            class="inline-flex items-center px-4 py-2 bg-primary-800 border border-transparent rounded-md font-semibold text-xs text-primary-300  uppercase tracking-widest hover:bg-primary-700 active:bg-primary-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Go back</a>
                    </div>
                </x-jet-authentication-card>
            </div>
        </div>
    </x-base-layout>
@endif
