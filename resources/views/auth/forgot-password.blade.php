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
                                        <a href="{{ route('login') }}">
                                            <x-application-logo class="w-48 mx-auto" color="#eb4432" />
                                        </a>
                                        <h4 class="pb-1 mt-1 mb-12 text-xl font-semibold">
                                            Let's build something amazing.
                                        </h4>
                                    </div>
                                    <div class="mb-4 text-sm text-gray-600">
                                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                                    </div>

                                    @if (session('status'))
                                        <div class="mb-4 text-sm font-medium text-green-600">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="text" name="email" id="email"
                                                value="{{ old('email') }}" />
                                            @error('email')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            <x-button>
                                                {{ __('Email Password Reset Link') }}
                                            </x-button>
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
