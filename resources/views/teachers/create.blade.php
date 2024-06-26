<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="">Create a new teacher</h1>
        </div>

        <form action="{{ route("teachers.store") }}" method="post" class="space-y-8" enctype="multipart/form-data">
            @csrf
            <div class="w-1/3">
                <x-input-label for="name">Name</x-input-label>
                <x-text-input
                    id="name"
                    type="text"
                    name="name"
                    :value="old('name')"
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
                    :value="old('email')"
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
                            <label for="upload" class="cursor-pointer">
                                <i class="fi fi-sr-inbox-out mb-2 text-4xl"></i>
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-zinc-700">
                                    Upload teacher's sign
                                </h5>
                                <p class="text-sm font-normal text-zinc-400 md:px-6">
                                    Choose photo size should be less than
                                    <b class="text-zinc-600">2MB</b>
                                </p>
                                <p class="text-sm font-normal text-zinc-400 md:px-6">
                                    and should be in
                                    <b class="text-zinc-600">PNG</b>
                                    format.
                                </p>
                                <span id="filename" class="z-50 bg-zinc-200 text-zinc-500"></span>
                            </label>
                        </div>
                    </div>
                </div>
                @error("sign")
                    <p class="mt-2 text-sm text-red-600">{{ $errors->first("sign") }}</p>
                @enderror
            </div>

            <div class="mt-5 flex w-1/3 justify-end gap-10">
                <a href="{{ route("teachers.index") }}" class="btn-outline-zinc w-full">Cancel</a>
                <button type="submit" class="btn-zinc w-full">Create</button>
            </div>
        </form>
    </div>
    @section("scripts")
        <script src="{{ asset("js/uploadPhotoPreview.js") }}"></script>
    @endsection
</x-app-layout>
