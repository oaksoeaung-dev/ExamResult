@php use Carbon\Carbon; @endphp
<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="">Edit the class</h1>
        </div>

        <form action="{{ route('classes.update',$class->id) }}" method="post" class="space-y-8">
            @csrf
            @method("PUT")
            <div class="w-1/3">
                <x-input-label for="name">Name</x-input-label>
                <x-text-input id="name" type="text" name="name" :value="old('name',$class->name)" :messages="$errors->get('name')" icon="fi fi-rr-chalkboard-user" placeholder="Enter class name" />
            </div>

            <div date-rangepicker datepicker-format="dd-M-yyyy" >
                <div class="flex items-center">
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <i class="fi fi-rr-calendar"></i>
                        </div>
                        <input name="start" type="text" value="{{ old('start',Carbon::parse($class->startdate)->format("d-M-Y")) }}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full ps-10 p-2.5" placeholder="Select date start">
                    </div>
                    <span class="mx-4 text-gray-500">to</span>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <i class="fi fi-rr-calendar"></i>
                        </div>
                        <input name="end" type="text" value="{{ old('end',Carbon::parse($class->enddate)->format("d-M-Y")) }}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full ps-10 p-2.5 " placeholder="Select date end">
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
                        @if($class->subjects->find($subject->id))
                            <x-select-box name="subjects[]" :checked="true" value="{{ $subject->id }}">{{ $subject->name }}</x-select-box>
                        @else
                            <x-select-box name="subjects[]" :checked="false" value="{{ $subject->id }}">{{ $subject->name }}</x-select-box>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="w-full">
                <p class="font-medium text-sm mb-2">Activities</p>
                <div class="grid grid-cols-5 gap-3">
                    @foreach($activities as $activity)
                        @if($class->activities->find($activity->id))
                            <x-select-box name="activities[]" :checked="true" value="{{ $activity->id }}">{{ $activity->name }}</x-select-box>
                        @else
                            <x-select-box name="activities[]" :checked="false" value="{{ $activity->id }}">{{ $activity->name }}</x-select-box>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="w-full">
                <p class="font-medium text-sm mb-2">Behaviours</p>
                <div class="grid grid-cols-5 gap-3">
                    @foreach($behaviours as $behaviour)
                        @if($class->behaviours->find($behaviour->id))
                            <x-select-box name="behaviours[]" :checked="true" value="{{ $behaviour->id }}">{{ $behaviour->name }}</x-select-box>
                        @else
                            <x-select-box name="behaviours[]" :checked="false" value="{{ $behaviour->id }}">{{ $behaviour->name }}</x-select-box>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="flex gap-10 justify-end mt-5 w-1/2">
                <a href="{{ route('classes.index') }}" class="btn-outline-gray w-full">Cancel</a>
                <button type="submit" class="btn-gray w-full">Update</button>
            </div>
        </form>
    </div>
    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    @endsection
</x-app-layout>
