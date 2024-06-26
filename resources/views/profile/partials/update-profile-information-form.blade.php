<section>
    <header>
        <h2 class="text-lg font-medium text-zinc-900">
            {{ __("Profile Information") }}
        </h2>

        <p class="mt-1 text-sm text-zinc-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route("verification.send") }}">
        @csrf
    </form>

    <form method="post" action="{{ route("profile.update") }}" class="mt-6 space-y-6">
        @csrf
        @method("patch")

        <div>
            <x-input-label for="name">Name</x-input-label>
            <x-text-input
                id="name"
                type="text"
                name="name"
                :value="old('name',$user->name)"
                :messages="$errors->get('name')"
                icon="fi fi-rr-user"
                placeholder="name@example.com"
            />
        </div>

        <div>
            <div>
                <x-input-label for="email">Email</x-input-label>
                <x-text-input
                    id="email"
                    type="email"
                    name="email"
                    :value="old('email',$user->email)"
                    :messages="$errors->get('email')"
                    icon="fi fi-rr-at"
                    placeholder="name@example.com"
                />
            </div>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-zinc-800">
                        {{ __("Your email address is unverified.") }}

                        <button
                            form="send-verification"
                            class="rounded-md text-sm text-zinc-600 underline hover:text-zinc-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        >
                            {{ __("Click here to re-send the verification email.") }}
                        </button>
                    </p>

                    @if (session("status") === "verification-link-sent")
                        <p class="mt-2 text-sm font-medium text-green-600">
                            {{ __("A new verification link has been sent to your email address.") }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __("Save") }}</x-primary-button>

            @if (session("status") === "profile-updated")
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => (show = false), 2000)"
                    class="text-sm text-zinc-600"
                >
                    {{ __("Saved.") }}
                </p>
            @endif
        </div>
    </form>
</section>
