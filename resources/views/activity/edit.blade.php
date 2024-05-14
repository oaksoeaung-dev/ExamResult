<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="">Edit the activity</h1>
        </div>

        <form action="{{ route('activities.update',$activity->id) }}" method="post" class="space-y-8 w-1/3">
            @csrf
            @method('PUT')
            <div>
                <x-input-label for="name">Name</x-input-label>
                <x-text-input id="name" type="text" name="name" :value="old('name',$activity->name)" :messages="$errors->get('name')" icon="fi fi-rr-gym" placeholder="Enter activity name" />
            </div>

            <div class="flex gap-10 justify-end mt-5">
                <a href="{{ route('activities.index') }}" class="btn-outline-gray w-full">Cancel</a>
                <button type="submit" class="btn-gray w-full">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
