<x-guest-layout>
    <section class="w-full h-screen gradient-form bg-neutral-200">
        <div class="container h-screen m-auto">
            <div class="flex items-center justify-center h-full g-6 text-neutral-800">
                <div class="w-full">
                    <div class="block bg-white rounded-lg shadow-lg">
                        <div class="g-0 lg:flex lg:flex-wrap">
                            <div class="px-4 md:px-0 lg:w-6/12">
                                <div class="md:mx-6 md:p-12">
                                    <div class="text-center">
                                        <x-application-logo class="w-48 mx-auto" color="#eb4432" />
                                        <h4 class="pb-1 mt-1 mb-12 text-xl font-semibold">
                                            Let's build something amazing.
                                        </h4>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}" class="space-y-4">
                                        @csrf
                                        <p class="mb-4">Please login to your account</p>
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" name="email" id="email"/>
                                            @error('email')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password"/>
                                            @error('password')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <label for="remember_me" class="flex items-center">
                                            <x-checkbox id="remember_me" name="remember" />
                                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                        </label>
                                        <div class="pt-1 pb-1 mb-12 text-center">
                                            <button
                                                class="mb-3 inline-block w-full rounded px-6 pt-2.5 pb-2 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_rgba(0,0,0,0.2)] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] focus:outline-none focus:ring-0 active:shadow-[0_8px_9px_-4px_rgba(0,0,0,0.1),0_4px_18px_0_rgba(0,0,0,0.2)] bg-gradient-to-r from-orange-300 via-red-500 to-purple-400"
                                                type="submit">
                                                Log in
                                            </button>
                                            <a href="{{ route('password.request') }}">Forgot password?</a>
                                        </div>
                                        <div class="flex items-center justify-between pb-6">
                                            <p class="mb-0 mr-2">Don't have an account?</p>
                                            <a href="{{ route('register') }}"
                                                class="inline-block rounded border-2 border-danger px-6 pt-2 pb-[6px] text-xs font-medium uppercase leading-normal text-danger transition duration-150 ease-in-out hover:border-danger-600 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-danger-600 focus:border-danger-600 focus:text-danger-600 focus:outline-none focus:ring-0 active:border-danger-700 active:text-danger-700">
                                                Register
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="flex items-center rounded-b-lg lg:w-6/12 lg:rounded-r-lg lg:rounded-bl-none bg-gradient-to-r from-orange-300 via-red-500 to-purple-400"
                                style="background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593)">
                                <div class="px-4 py-6 text-white md:mx-6 md:p-12">
                                    <h4 class="mb-6 text-xl font-semibold">
                                        Laravel is more than just a framework
                                    </h4>
                                    <p class="text-sm">
                                        Laravel is a web application framework with expressive, elegant syntax. We
                                        believe development must be an enjoyable and creative experience to be truly
                                        fulfilling. Laravel attempts to take the pain out of development by easing
                                        common tasks used in most web projects
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>