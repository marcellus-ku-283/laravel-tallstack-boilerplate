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
                                    
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name"
                                                value="{{ old('name') }}" />
                                            @error('name')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" name="email" id="email"
                                                value="{{ old('email') }}" />
                                            @error('email')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password"
                                                value="{{ old('email') }}" />
                                            @error('password')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation"
                                                value="{{ old('password_confirmation') }}" />
                                            @error('password_confirmation')
                                                <span>{{ $message }}</span>
                                            @enderror
                                        </div>

                                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                            <div class="mt-4">
                                                <x-label for="terms">
                                                    <div class="flex items-center">
                                                        <x-checkbox name="terms" id="terms" required />

                                                        <div class="ml-2">
                                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                                'terms_of_service' =>
                                                                    '<a target="_blank" href="' .
                                                                    route('terms.show') .
                                                                    '" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                                    __('Terms of Service') .
                                                                    '</a>',
                                                                'privacy_policy' =>
                                                                    '<a target="_blank" href="' .
                                                                    route('policy.show') .
                                                                    '" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                                                    __('Privacy Policy') .
                                                                    '</a>',
                                                            ]) !!}
                                                        </div>
                                                    </div>
                                                </x-label>
                                            </div>
                                        @endif

                                        <div class="flex items-center justify-end mt-4">
                                            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                href="{{ route('login') }}">
                                                {{ __('Already registered?') }}
                                            </a>

                                            <x-button class="ml-4">
                                                {{ __('Register') }}
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
