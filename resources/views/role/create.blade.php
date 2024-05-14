<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="">Create a new role</h1>
        </div>

        <form action="{{ route('role.store') }}" method="post" class="space-y-8 w-1/3">
            @csrf
            <div>
                <x-input-label for="name">Name</x-input-label>
                <x-text-input id="name" type="name" name="name" :value="old('name')" :messages="$errors->get('name')" icon="fi fi-rr-admin-alt" placeholder="Enter role name" />
            </div>

            <div>
                <p class="block mb-2 text-sm font-medium text-gray-700">Permissions For Subject</p>
                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white divide-x divide-gray-200 border border-gray-200 rounded-lg sm:flex shadow">
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

            <div class="flex gap-10 justify-end mt-5">
                <a href="{{ route('role.index') }}" class="btn-outline-gray w-full">Cancel</a>
                <button type="submit" class="btn-gray w-full">Create</button>
            </div>
        </form>
    </div>
</x-app-layout>
