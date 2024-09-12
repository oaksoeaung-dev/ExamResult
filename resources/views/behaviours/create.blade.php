<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="">Create a new behaviour</h1>
        </div>

        <form action="{{ route("behaviours.store") }}" method="post" class="w-1/3 space-y-8">
            @csrf
            <div>
                <x-input-label for="name">Name</x-input-label>
                <x-text-input id="name" type="text" name="name" :value="old('name')" :messages="$errors->get('name')" icon="fi fi-rr-house-laptop" placeholder="Enter behaviour name" />
            </div>

            <div class="mt-5 flex justify-end gap-10">
                <a href="{{ route("behaviours.index") }}" class="btn-outline-zinc w-full">Cancel</a>
                <button type="submit" class="btn-zinc w-full">Create</button>
            </div>
        </form>
    </div>
</x-app-layout>
