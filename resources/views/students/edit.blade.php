<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="">Edit the student</h1>
        </div>

        <form action="{{ route('students.update',$student->id) }}" method="post" class="space-y-8" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <div class="max-w-sm bg-white rounded-lg shadow-md overflow-hidden items-center">
                    <div class="">
                        <input id="upload" type="file" name="studentphoto" class="hidden"  />
                        <div id="image-preview" class="max-w-sm p-6 bg-gray-50 rounded-lg items-center mx-auto text-center cursor-pointer">
                            <img src="{{ asset('storage/studentphotos/'.$student->image) }}" class="w-48 h-48 object-cover rounded-lg mx-auto" alt="Image preview" />
                        </div>
                    </div>
                </div>
                @error('studentphoto')
                    <p class="text-sm text-red-600 mt-2">{{ $errors->first('studentphoto') }}</p>
                @enderror
            </div>

            <div class="w-1/3">
                <x-input-label for="name">Name</x-input-label>
                <x-text-input id="name" type="text" name="name" :value="old('name',$student->name)" :messages="$errors->get('name')" icon="fi fi-rr-student" placeholder="Enter student name" />
            </div>

            <div class="w-1/3">
                <x-input-label for="email">Email</x-input-label>
                <x-text-input id="email" type="email" name="email" :value="old('email',$student->email)" :messages="$errors->get('email')" icon="fi fi-rr-envelope" placeholder="Enter student email address" />
            </div>

            <div class="w-1/3">
                <x-input-label for="phone">Phone</x-input-label>
                <x-text-input id="phone" type="phone" name="phone" :value="old('phone',$student->phone)" :messages="$errors->get('phone')" icon="fi fi-rr-mobile-notch" placeholder="Enter student phone number" />
            </div>

            <div>
                <p class="text-sm font-medium mb-3">Gender</p>
                <div class="flex gap-5 items-center">
                    <div class="flex gap-2 items-center">
                        <input id="male" type="radio" value="male" {{ ($student->gender == 'male') ? "checked" : "" }} name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <label for="male" class="text-sm font-medium text-gray-900">Male</label>
                    </div>
                    <div class="flex gap-2 items-center">
                        <input id="female" type="radio" value="female" {{ ($student->gender == 'female') ? "checked" : "" }} name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                        <label for="female" class="text-sm font-medium text-gray-900">Female</label>
                    </div>
                </div>
                @error('gender')
                <p class="text-sm text-red-600 mt-2">{{ $errors->first('gender') }}</p>
                @enderror
            </div>

            <div class="flex gap-10 justify-end mt-5 w-1/3">
                <a href="{{ route('students.index') }}" class="btn-outline-gray w-full">Cancel</a>
                <button type="submit" class="btn-gray w-full">Update</button>
            </div>
        </form>
    </div>
    @section('scripts')
        <script src="{{ asset('js/editPhotoPreview.js') }}"></script>
    @endsection
</x-app-layout>
