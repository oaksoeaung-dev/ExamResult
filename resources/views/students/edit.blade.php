@php use Carbon\Carbon; @endphp
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
                        <div id="image-preview" class="max-w-sm p-6 bg-zinc-50 rounded-lg items-center mx-auto text-center cursor-pointer">
                            <img src="{{ asset('storage/studentphotos/'.$student->image) }}" class="w-48 h-48 object-cover rounded-lg mx-auto" alt="Image preview" />
                        </div>
                    </div>
                </div>
                @error('studentphoto')
                    <p class="text-sm text-red-600 mt-2">{{ $errors->first('studentphoto') }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div class="">
                    <x-input-label for="stdId">Student ID</x-input-label>
                    <x-text-input id="stdId" type="text" name="stdId" :value="old('stdId',$student->stdId)" :messages="$errors->get('stdId')" icon="fi fi-rr-id-badge" placeholder="Enter student Id" />
                </div>

                <div class="">
                    <x-input-label for="name">Name</x-input-label>
                    <x-text-input id="name" type="text" name="name" :value="old('name',$student->name)" :messages="$errors->get('name')" icon="fi fi-rr-student" placeholder="Enter student name" />
                </div>

                <div class="">
                    <x-input-label for="email">Email</x-input-label>
                    <x-text-input id="email" type="email" name="email" :value="old('email',$student->email)" :messages="$errors->get('email')" icon="fi fi-rr-envelope" placeholder="Enter student email address" />
                </div>

                <div class="">
                    <x-input-label for="phone">Phone</x-input-label>
                    <x-text-input id="phone" type="phone" name="phone" :value="old('phone',$student->phone)" :messages="$errors->get('phone')" icon="fi fi-rr-mobile-notch" placeholder="Enter student phone number" />
                </div>

                <div class="">
                    <x-input-label for="address">Address</x-input-label>
                    <x-text-input id="address" type="text" name="address" :value="old('address',$student->address)" :messages="$errors->get('address')" icon="fi fi-rr-map-marker-home" placeholder="Enter student address" />
                </div>


                <div>
                    <x-input-label>Date Of Birth</x-input-label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <i class="fi fi-rr-calendar"></i>
                        </div>
                        <input datepicker datepicker-format="dd-M-yyyy" name="dob" type="text" value="{{ old('dob',Carbon::parse($student->dob)->format("d-M-Y")) }}" class="border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-zinc-500 focus:border-zinc-500 block w-full ps-10 p-2.5" placeholder="Select date of birth">
                    </div>
                </div>

                <div class="">
                    <x-input-label for="guardian_name">Guardian Name</x-input-label>
                    <x-text-input id="guardian_name" type="text" name="guardian_name" :value="old('guardian_name',$student->guardian_name)" :messages="$errors->get('guardian_name')" icon="fi fi-rr-users" placeholder="Enter guardian name" />
                </div>

                <div>
                    <p class="text-sm font-medium mb-3">Gender</p>
                    <div class="flex gap-5 items-center">
                        <div class="flex gap-2 items-center">
                            <input id="male" type="radio" value="male" {{ ($student->gender == 'male') ? "checked" : "" }} name="gender" class="w-4 h-4 text-blue-600 bg-zinc-100 border-zinc-300 focus:ring-blue-500">
                            <label for="male" class="text-sm font-medium text-zinc-900">Male</label>
                        </div>
                        <div class="flex gap-2 items-center">
                            <input id="female" type="radio" value="female" {{ ($student->gender == 'female') ? "checked" : "" }} name="gender" class="w-4 h-4 text-blue-600 bg-zinc-100 border-zinc-300 focus:ring-blue-500">
                            <label for="female" class="text-sm font-medium text-zinc-900">Female</label>
                        </div>
                    </div>
                    @error('gender')
                    <p class="text-sm text-red-600 mt-2">{{ $errors->first('gender') }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex gap-10 justify-end mt-5 w-1/3">
                <a href="{{ route('students.index') }}" class="btn-outline-zinc w-full">Cancel</a>
                <button type="submit" class="btn-zinc w-full">Update</button>
            </div>
        </form>
    </div>
    @section('scripts')
        <script src="{{ asset('js/editPhotoPreview.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    @endsection
</x-app-layout>
