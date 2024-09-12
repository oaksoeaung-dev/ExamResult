<x-guest-layout>
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="hidden self-end md:block">
            <img src="{{ asset("images/background/citylife.svg") }}" class="w-full object-cover" />
        </div>
        <div class="px-10 py-16">
            <h1 class="my-4 text-center text-4xl text-zinc-800">User Registration</h1>
            <form method="POST" action="{{ route("register") }}">
                @csrf

                <!-- Name -->
                <div class="mt-4">
                    <x-input-label for="name">Name</x-input-label>
                    <x-text-input id="name" type="text" name="name" :value="old('name')" :messages="$errors->get('name')" icon="fi fi-rr-user" placeholder="" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email">Email</x-input-label>
                    <x-text-input id="email" type="email" name="email" :value="old('email')" :messages="$errors->get('email')" icon="fi fi-rr-at" placeholder="" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password">Password</x-input-label>
                    <x-text-input id="password" type="password" name="password" :messages="$errors->get('password')" icon="fi fi-rr-lock" placeholder="" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation">Confirm Password</x-input-label>
                    <x-text-input id="password_confirmation" type="password" name="password_confirmation" :messages="$errors->get('password_confirmation')" icon="fi fi-rr-lock" placeholder="" />
                </div>

                <div class="mt-4 flex items-center justify-end">
                    <a class="rounded-md text-sm text-zinc-600 underline hover:text-zinc-900 focus:outline-none focus:ring-2 focus:ring-zinc-500 focus:ring-offset-2" href="{{ route("login") }}">
                        {{ __("Already registered?") }}
                    </a>

                    <x-primary-button class="ms-4">
                        {{ __("Register") }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
