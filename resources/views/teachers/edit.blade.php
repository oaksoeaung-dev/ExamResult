<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="">Edit the teacher</h1>
        </div>

        <form
            action="{{ route("teachers.update", $teacher->id) }}"
            method="post"
            class="space-y-8"
            enctype="multipart/form-data"
        >
            @csrf
            @method("PUT")
            <div class="w-1/3">
                <x-input-label for="name">Name</x-input-label>
                <x-text-input
                    id="name"
                    type="text"
                    name="name"
                    :value="old('name',$teacher->name)"
                    :messages="$errors->get('name')"
                    icon="fi fi-rr-lesson-class"
                    placeholder="Enter teacher name"
                />
            </div>

            <div class="w-1/3">
                <x-input-label for="email">Email</x-input-label>
                <x-text-input
                    id="email"
                    type="email"
                    name="email"
                    :value="old('email',$teacher->email)"
                    :messages="$errors->get('email')"
                    icon="fi fi-rr-envelope"
                    placeholder="Enter teacher email address"
                />
            </div>

            <div>
                <div class="max-w-sm items-center overflow-hidden rounded-lg bg-white shadow-md">
                    <div class="">
                        <input id="upload" type="file" name="sign" class="hidden" />
                        <div
                            id="image-preview"
                            class="mx-auto max-w-sm cursor-pointer items-center rounded-lg bg-zinc-50 p-6 text-center"
                        >
                            <img
                                src="{{ asset("storage/signs/" . $teacher->sign) }}"
                                class="mx-auto h-48 w-48 rounded-lg object-cover"
                                alt="Image preview"
                            />
                        </div>
                    </div>
                </div>
                @error("sign")
                    <p class="mt-2 text-sm text-red-600">{{ $errors->first("sign") }}</p>
                @enderror
            </div>

            <div class="mt-5 flex w-1/3 justify-end gap-10">
                <a href="{{ route("teachers.index") }}" class="btn-outline-zinc w-full">Cancel</a>
                <button type="submit" class="btn-zinc w-full">Update</button>
            </div>
        </form>
    </div>
    @section("scripts")
        <script src="{{ asset("js/editPhotoPreview.js") }}"></script>
    @endsection
</x-app-layout>
