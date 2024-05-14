@php
    use Carbon\Carbon;
@endphp
<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="">Add Exam Results</h1>
        </div>

        <form action="{{ route('activities.store') }}" method="post" class="grid grid-cols-3 gap-5">
            @csrf
            <div class="rounded-lg overflow-hidden shadow-lg h-fit bg-white pb-2">
                <h4 class="text-xl py-2 text-center text-white font-semibold bg-teal-400">Information</h4>
                <div class="px-5 py-2">
                    <input type="text" class="bg-white border-gray-300 border text-gray-500 text-sm rounded-lg shadow-sm focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5" value="{{ $student->name }}" disabled />
                </div>
                <div class="px-5 py-2">
                    <input type="text" class="bg-white border-gray-300 border text-gray-500 text-sm rounded-lg shadow-sm focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5" value="{{ $class->name }}" disabled />
                </div>
                <div class="px-5 py-2">
                    <input type="text" class="bg-white border-gray-300 border text-gray-500 text-sm rounded-lg shadow-sm focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5" value="{{ Carbon::parse($class->startdate)->format('Y')." - ".Carbon::parse($class->enddate)->format('Y') }}" disabled />
                </div>
                <div class="px-5 py-2">
                    <input type="text" class="bg-white border-gray-300 border text-gray-500 text-sm rounded-lg shadow-sm focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5" placeholder="Term" />
                </div>
                <div class="px-5 py-2">
                    <input type="text" class="bg-white border-gray-300 border text-gray-500 text-sm rounded-lg shadow-sm focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5" placeholder="Campus" />
                </div>
            </div>
            @foreach($class->subjects()->get() as $subject)
                <div class="rounded-lg overflow-hidden shadow-lg h-fit bg-white pb-2">
                    <h4 class="text-xl py-2 text-center text-white font-semibold bg-teal-400">{{ $subject->name }}</h4>
                    <div class="grid grid-cols-2 gap-5 px-5 py-2">
                        <p class="w-full p-2.5 text-sm border border-gray-300 text-gray-700 rounded-lg">Marks</p>
                        <input type="text" class="bg-white border-gray-300 border text-gray-900 text-sm rounded-lg shadow-sm focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"/>
                    </div>
                    @for($i = 1; $i <=6; $i++)
                        @if($subject['skill'.$i] != null)
                            <div class="grid grid-cols-2 gap-5 px-5 py-2">
                                <p class="w-full p-2.5 text-sm border border-gray-300 text-gray-700 rounded-lg">{{ $subject['skill'.$i]}}</p>
                                <input type="text" class="bg-white border-gray-300 border text-gray-900 text-sm rounded-lg shadow-sm focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"/>
                            </div>
                        @endif
                    @endfor
                </div>
            @endforeach

            <div class="rounded-lg overflow-hidden shadow-lg h-fit bg-white pb-2">
                <h4 class="text-xl py-2 text-center text-white font-semibold bg-teal-400">Attendance</h4>


                @for($i = 1; $i <=12; $i++)
                    <div class="grid grid-cols-2 gap-5 px-5 py-2">
                        <input type="text" class="bg-white border-gray-300 border text-gray-900 text-sm rounded-lg shadow-sm focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5" value="{{ Carbon::create(null, $i ,1)->format('F') }}"/>
                        <input type="text" class="bg-white border-gray-300 border text-gray-900 text-sm rounded-lg shadow-sm focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"/>
                    </div>
                @endfor
            </div>

            @if($class->behaviours()->get()->count() != 0)
                <div class="rounded-lg overflow-hidden shadow-lg h-fit bg-white pb-2">
                    <h4 class="text-xl py-2 text-center text-white font-semibold bg-teal-400">Behaviours</h4>
                    @foreach($class->behaviours()->get() as $behaviour)
                        <div class="grid grid-cols-2 gap-5 px-5 py-2">
                            <p class="w-full p-2.5 text-sm border border-gray-300 text-gray-700 rounded-lg">{{ $behaviour->name }}</p>
                            <input type="text" class="bg-white border-gray-300 border text-gray-900 text-sm rounded-lg shadow-sm focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"/>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="flex gap-10 justify-end mt-5">
                {{--<a href="{{ route('activities.index') }}" class="btn-outline-gray w-full">Cancel</a>
                <button type="submit" class="btn-gray w-full">Create</button>--}}
            </div>
        </form>
    </div>
</x-app-layout>
