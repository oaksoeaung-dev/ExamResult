<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="">Edit the teacher</h1>
        </div>

        <form action="{{ route('teachers.update',$teacher->id) }}" method="post" class="space-y-8" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="w-1/3">
                <x-input-label for="name">Name</x-input-label>
                <x-text-input id="name" type="text" name="name" :value="old('name',$teacher->name)" :messages="$errors->get('name')" icon="fi fi-rr-lesson-class" placeholder="Enter teacher name" />
            </div>

            <div class="w-1/3">
                <x-input-label for="email">Email</x-input-label>
                <x-text-input id="email" type="email" name="email" :value="old('email',$teacher->email)" :messages="$errors->get('email')" icon="fi fi-rr-envelope" placeholder="Enter teacher email address" />
            </div>

            <div>
                <div class="max-w-sm bg-white rounded-lg shadow-md overflow-hidden items-center">
                    <div class="">
                        <input id="upload" type="file" name="sign" class="hidden"  />
                        <div id="image-preview" class="max-w-sm p-6 bg-gray-50 rounded-lg items-center mx-auto text-center cursor-pointer">
                            <img src="{{ asset('storage/signs/'.$teacher->sign) }}" class="w-48 h-48 object-cover rounded-lg mx-auto" alt="Image preview" />
                        </div>
                    </div>
                </div>
                @error('sign')
                <p class="text-sm text-red-600 mt-2">{{ $errors->first('sign') }}</p>
                @enderror
            </div>


            <div class="flex gap-10 justify-end mt-5 w-1/3">
                <a href="{{ route('teachers.index') }}" class="btn-outline-gray w-full">Cancel</a>
                <button type="submit" class="btn-gray w-full">Update</button>
            </div>
        </form>
    </div>
    @section('scripts')
        <script src="{{ asset('js/editPhotoPreview.js') }}"></script>
    @endsection
</x-app-layout>
