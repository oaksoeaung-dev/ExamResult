<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="">Create a new subject</h1>
        </div>

        <form action="{{ route("subjects.store") }}" method="post" class="w-1/3 space-y-8">
            @csrf
            <div>
                <x-input-label for="name">Name</x-input-label>
                <x-text-input
                    id="name"
                    type="text"
                    name="name"
                    :value="old('name')"
                    :messages="$errors->get('name')"
                    icon="fi fi-rr-diary-bookmark-down"
                    placeholder="Enter subject name"
                />
            </div>

            <div class="">
                <p class="mb-2 text-sm font-medium text-zinc-700">Skills</p>
                <div class="space-y-3">
                    @for ($i = 1; $i <=6; $i++)
                        <div>
                            <x-text-input
                                id="skill{{ $i }}"
                                type="text"
                                name="skill{{ $i }}"
                                :value="old('skill'.$i)"
                                :messages="$errors->get('skill'.$i)"
                                icon="fi fi-rr-star"
                            />
                        </div>
                    @endfor
                </div>
            </div>

            <div class="mt-5 flex justify-end gap-10">
                <a href="{{ route("subjects.index") }}" class="btn-outline-zinc w-full">Cancel</a>
                <button type="submit" class="btn-zinc w-full">Create</button>
            </div>
        </form>
    </div>
</x-app-layout>
