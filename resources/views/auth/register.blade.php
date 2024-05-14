<x-guest-layout>
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="hidden md:block self-end">
            <img src="{{ asset('images/background/citylife.svg') }}" class="w-full object-cover"/>
        </div>
        <div class="py-16 px-10">
            <h1 class="text-4xl text-gray-800 text-center my-4">User Registration</h1>
            <form method="POST" action="{{ route('register') }}">
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
                    <x-input-label for="password_confirmation">Password</x-input-label>
                    <x-text-input id="password_confirmation" type="password" name="password_confirmation" :messages="$errors->get('password_confirmation')" icon="fi fi-rr-lock" placeholder="" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
