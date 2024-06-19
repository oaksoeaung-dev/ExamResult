<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="">Edit the subject</h1>
        </div>

        <form action="{{ route('subjects.update',$subject->id) }}" method="post" class="space-y-8 w-1/3">
            @csrf
            @method('PUT')
            <div>
                <x-input-label for="name">Name</x-input-label>
                <x-text-input id="name" type="text" name="name" :value="old('name',$subject->name)" :messages="$errors->get('name')" icon="fi fi-rr-diary-bookmark-down" placeholder="Enter subject name" />
            </div>

            <div class="">
                <p class="text-sm font-medium text-zinc-700 mb-2">Skills</p>
                <div class="space-y-3">
                    @for($i = 1; $i <=6; $i++)
                        <div>
                            <x-text-input id="skill{{ $i }}" type="text" name="skill{{ $i }}" :value="old('skill'.$i,$subject['skill'.$i])" :messages="$errors->get('skill'.$i)" icon="fi fi-rr-star" />
                        </div>
                    @endfor
                </div>
            </div>

            <div class="flex gap-10 justify-end mt-5">
                <a href="{{ route('subjects.index') }}" class="btn-outline-zinc w-full">Cancel</a>
                <button type="submit" class="btn-zinc w-full">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
