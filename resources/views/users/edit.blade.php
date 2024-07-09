<x-app-layout>
    <form action="{{ route("users.update", $user->id) }}" method="POST" class="w-1/3 space-y-10">
        @csrf
        @method("PUT")
        <h1>Edit the User</h1>
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
        <div>
            <select
                id=""
                name="role_id"
                class="mb-6 block w-full rounded-lg border border-zinc-300 bg-zinc-50 p-2 text-sm text-zinc-900 focus:outline-none focus:ring-2 focus:ring-zinc-300 focus:ring-offset-1"
            >
                <option selected disabled>Select Role</option>
                @foreach ($roles as $role)
                    <option
                        value="{{ $role->id }}"
                        {{ old("role_id", $user->role->id) == $role->id ? "selected" : "" }}
                    >
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="">
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input
                id="update_password_password"
                type="password"
                name="password"
                :messages="$errors->updatePassword->get('password')"
                icon="fi fi-br-lock"
            />
        </div>
        <div class="">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input
                id="update_password_password_confirmation"
                type="password"
                name="password_confirmation"
                :messages="$errors->updatePassword->get('password_confirmation')"
                icon="fi fi-sr-lock"
            />
        </div>
        <div class="flex justify-end gap-10">
            <a href="{{ route("users.index") }}" class="btn-outline-zinc w-full">Cancel</a>
            <button type="submit" class="btn-zinc w-full">Update</button>
        </div>
    </form>
</x-app-layout>
