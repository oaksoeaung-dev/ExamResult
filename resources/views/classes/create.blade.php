<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="">Create a new class</h1>
        </div>

        <form action="{{ route('classes.store') }}" method="post" class="space-y-8">
            @csrf
            <div class="w-1/3">
                <x-input-label for="name">Name</x-input-label>
                <x-text-input id="name" type="text" name="name" :value="old('name')" :messages="$errors->get('name')" icon="fi fi-rr-workshop" placeholder="Enter class name" />
            </div>

            <div date-rangepicker datepicker-format="dd-M-yyyy" >
                <div class="flex items-center">
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <i class="fi fi-rr-calendar"></i>
                        </div>
                        <input name="start" type="text" value="{{ old('start') }}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full ps-10 p-2.5" placeholder="Select date start">
                    </div>
                    <span class="mx-4 text-gray-500"><i class="fi fi-rr-arrow-right"></i></span>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <i class="fi fi-rr-calendar"></i>
                        </div>
                        <input name="end" type="text" value="{{ old('end') }}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full ps-10 p-2.5 " placeholder="Select date end">
                    </div>
                </div>

                <div>
                    @if($errors->has('start'))
                        <p class="mt-2 text-red-600 text-sm">{{ $errors->first('start') }}</p>
                    @endif
                    @if($errors->has('end'))
                        <p class="mt-2 text-red-600 text-sm">{{ $errors->first('end') }}</p>
                    @endif
                </div>
            </div>

            <div class="w-full">
                <p class="font-medium text-sm mb-2">Subjects</p>
                <div class="grid grid-cols-5 gap-3">
                    @foreach($subjects as $subject)
                        <x-select-box name="subjects[]" value="{{ $subject->id }}">{{ $subject->name }}</x-select-box>
                    @endforeach
                </div>
            </div>

            <div class="w-full">
                <p class="font-medium text-sm mb-2">Activities</p>
                <div class="grid grid-cols-5 gap-3">
                    @foreach($activities as $activity)
                        <x-select-box name="activities[]" value="{{ $activity->id }}">{{ $activity->name }}</x-select-box>
                    @endforeach
                </div>
            </div>

            <div class="w-full">
                <p class="font-medium text-sm mb-2">Behaviours</p>
                <div class="grid grid-cols-5 gap-3">
                    @foreach($behaviours as $behaviour)
                        <x-select-box name="behaviours[]" value="{{ $behaviour->id }}">{{ $behaviour->name }}</x-select-box>
                    @endforeach
                </div>
            </div>

            <div class="flex gap-10 justify-end mt-5 w-1/2">
                <a href="{{ route('classes.index') }}" class="btn-outline-gray w-full">Cancel</a>
                <button type="submit" class="btn-gray w-full">Create</button>
            </div>
        </form>
    </div>
    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    @endsection
</x-app-layout>
