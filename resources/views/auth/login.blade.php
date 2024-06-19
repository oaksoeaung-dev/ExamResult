<x-guest-layout>
    <!-- Session Status -->
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="hidden md:block self-end">
            <img src="{{ asset('images/background/park.svg') }}" class="w-full object-cover"/>
        </div>
        <div class="py-28 px-10">
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <h1 class="text-4xl text-zinc-800 text-center my-4">WELCOME</h1>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email">Email</x-input-label>
                    <x-text-input id="email" type="email" name="email" :value="old('email')" :messages="$errors->get('email')" icon="fi fi-rr-at" placeholder="name@example.com" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" type="password" name="password" :value="old('password')" :messages="$errors->get('password')" icon="fi fi-rr-lock" placeholder="name@example.com" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-zinc-300 text-zinc-600 shadow-sm focus:ring-zinc-500" name="remember">
                        <span class="ms-2 text-sm text-zinc-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-zinc-600 hover:text-zinc-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-zinc-500" href="{{ route('register') }}">
                        {{ __('Register here!') }}
                    </a>
                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
