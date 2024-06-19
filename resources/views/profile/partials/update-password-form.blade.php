<section>
    <header>
        <h2 class="text-lg font-medium text-zinc-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-zinc-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="mt-4">
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" type="password" name="current_password" :messages="$errors->updatePassword->get('current_password')" icon="fi fi-rr-lock"/>
        </div>

        <div class="mt-4">
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" type="password" name="password" :messages="$errors->updatePassword->get('password')" icon="fi fi-br-lock"/>
        </div>

        <div class="mt-4">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" type="password" name="password_confirmation" :messages="$errors->updatePassword->get('password_confirmation')" icon="fi fi-sr-lock"/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-zinc-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
