<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="">Create a new teacher</h1>
        </div>

        <form action="{{ route('teachers.store') }}" method="post" class="space-y-8" enctype="multipart/form-data">
            @csrf
            <div class="w-1/3">
                <x-input-label for="name">Name</x-input-label>
                <x-text-input id="name" type="text" name="name" :value="old('name')" :messages="$errors->get('name')" icon="fi fi-rr-lesson-class" placeholder="Enter teacher name" />
            </div>

            <div class="w-1/3">
                <x-input-label for="email">Email</x-input-label>
                <x-text-input id="email" type="email" name="email" :value="old('email')" :messages="$errors->get('email')" icon="fi fi-rr-envelope" placeholder="Enter teacher email address" />
            </div>

            <div>
                <div class="max-w-sm bg-white rounded-lg shadow-md overflow-hidden items-center">
                    <div class="">
                        <input id="upload" type="file" name="sign" class="hidden"  />
                        <div id="image-preview" class="max-w-sm p-6 bg-gray-50 rounded-lg items-center mx-auto text-center cursor-pointer">
                            <label for="upload" class="cursor-pointer">
                                <i class="fi fi-sr-inbox-out text-4xl mb-2"></i>
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload teacher's sign</h5>
                                <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2MB</b></p>
                                <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b class="text-gray-600">PNG</b> format.</p>
                                <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                            </label>
                        </div>
                    </div>
                </div>
                @error('sign')
                <p class="text-sm text-red-600 mt-2">{{ $errors->first('sign') }}</p>
                @enderror
            </div>


            <div class="flex gap-10 justify-end mt-5 w-1/3">
                <a href="{{ route('teachers.index') }}" class="btn-outline-gray w-full">Cancel</a>
                <button type="submit" class="btn-gray w-full">Create</button>
            </div>
        </form>
    </div>
    @section('scripts')
        <script src="{{ asset('js/uploadPhotoPreview.js') }}"></script>
    @endsection
</x-app-layout>
