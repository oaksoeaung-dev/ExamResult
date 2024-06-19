@php use Carbon\Carbon; @endphp
<x-app-layout>
    <div class="space-y-5">
        <div class="max-w-xl mx-auto md:mx-0 lg:mx-0 bg-white border border-zinc-200 rounded-lg shadow-xl overflow-hidden">
            <a href="#">
                <img class="rounded-t-lg w-full h-[300px] object-cover" src="{{ asset('images/background/'. rand(1,8) .'.png') }}" alt="" />
            </a>
            <div class="p-5 space-y-4 bg-zinc-50">
                <div class="grid grid-cols-3 gap-1">
                    <div class="col-span-2">
                        <p class="font-medium mb-3 flex items-center gap-2"><i class="fi fi-rr-chalkboard-user"></i><span>Classes</span></p>
                        <p class="text-sm">{{ $class->name }}</p>
                    </div>
                    <div>

                    </div>
                </div>
                <div>
                    <p class="font-medium mb-3 flex items-center gap-2"><i class="fi fi-rr-calendar"></i><span>Start Date and End Date</span></p>
                    <p class="text-sm flex items-center gap-3"><span>{{ Carbon::parse($class->startdate)->format("d-M-Y") }}</span> <i class="fi fi-rr-arrow-right"></i> <span>{{ Carbon::parse($class->enddate)->format("d-M-Y") }}</span></p>
                </div>
                <hr/>
                <div class="grid grid-cols-3 gap-1">
                    <div>
                        <p class="font-medium mb-3 flex items-center gap-2"><i class="fi fi-rr-diary-bookmark-down"></i><span>Subjects</span></p>
                        <ul class="list-disc ps-4 space-y-2">
                            @foreach($class->subjects as $subject)
                                <li class="text-sm">{{ $subject->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <p class="font-medium mb-3 flex items-center gap-2"><i class="fi fi-rr-gym"></i><span>Activities</span></p>
                        <ul class="list-disc ps-4 space-y-2">
                            @foreach($class->activities as $activity)
                                <li class="text-sm">{{ $activity->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <p class="font-medium mb-3 flex items-center gap-2"><i class="fi fi-rr-house-laptop"></i><span>Behaviours</span></p>
                        <ul class="list-disc ps-4 space-y-2">
                            @foreach($class->behaviours as $behaviour)
                                <li class="text-sm">{{ $behaviour->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <hr/>
                <div class="flex gap-4">
                    <a href="{{ route('classes.index') }}" class="btn-outline-zinc w-full">Back</a>
                    <a href="{{ route('classes.edit',$class->id) }}" class="btn-zinc w-full">Edit</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
