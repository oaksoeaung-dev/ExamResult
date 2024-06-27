<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="">Create a new role</h1>
        </div>

        <form action="{{ route("role.store") }}" method="post" class="w-1/3 space-y-8">
            @csrf
            <div>
                <x-input-label for="name">Name</x-input-label>
                <x-text-input
                    id="name"
                    type="name"
                    name="name"
                    :value="old('name')"
                    :messages="$errors->get('name')"
                    icon="fi fi-rr-admin-alt"
                    placeholder="Enter role name"
                />
            </div>

            <div>
                <p class="mb-2 block text-sm font-medium text-zinc-700">Permissions For Subject</p>
                <ul
                    class="w-full items-center divide-x divide-zinc-200 rounded-lg border border-zinc-200 bg-white text-sm font-medium text-zinc-900 shadow sm:flex"
                >
                    <li class="w-full ps-3">
                        <x-select-box name="subject_create">Create</x-select-box>
                    </li>
                    <li class="w-full ps-3">
                        <x-select-box name="subject_read">Read</x-select-box>
                    </li>
                    <li class="w-full ps-3">
                        <x-select-box name="subject_update">Update</x-select-box>
                    </li>
                    <li class="w-full ps-3">
                        <x-select-box name="subject_delete">Delete</x-select-box>
                    </li>
                </ul>
            </div>

            <div>
                <p class="mb-2 block text-sm font-medium text-zinc-700">Permissions For Teacher</p>
                <ul
                    class="w-full items-center divide-x divide-zinc-200 rounded-lg border border-zinc-200 bg-white text-sm font-medium text-zinc-900 shadow sm:flex"
                >
                    <li class="w-full ps-3">
                        <x-select-box name="teacher_create">Create</x-select-box>
                    </li>
                    <li class="w-full ps-3">
                        <x-select-box name="teacher_read">Read</x-select-box>
                    </li>
                    <li class="w-full ps-3">
                        <x-select-box name="teacher_update">Update</x-select-box>
                    </li>
                    <li class="w-full ps-3">
                        <x-select-box name="teacher_delete">Delete</x-select-box>
                    </li>
                </ul>
            </div>

            <div class="mt-5 flex justify-end gap-10">
                <a href="{{ route("role.index") }}" class="btn-outline-zinc w-full">Cancel</a>
                <button type="submit" class="btn-zinc w-full">Create</button>
            </div>
        </form>
    </div>
</x-app-layout>
