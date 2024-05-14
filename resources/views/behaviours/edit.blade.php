<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="">Edit the behaviour</h1>
        </div>

        <form action="{{ route('behaviours.update',$behaviour->id) }}" method="post" class="space-y-8 w-1/3">
            @csrf
            @method('PUT')
            <div>
                <x-input-label for="name">Name</x-input-label>
                <x-text-input id="name" type="text" name="name" :value="old('name',$behaviour->name)" :messages="$errors->get('name')" icon="fi fi-rr-gym" placeholder="Enter behaviour name" />
            </div>

            <div class="flex gap-10 justify-end mt-5">
                <a href="{{ route('behaviours.index') }}" class="btn-outline-gray w-full">Cancel</a>
                <button type="submit" class="btn-gray w-full">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
