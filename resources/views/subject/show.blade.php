<x-app-layout>
    <div class="space-y-5">
        <div class="max-w-sm mx-auto md:mx-0 lg:mx-0 bg-white border border-zinc-200 rounded-lg shadow-lg overflow-hidden">
            <a href="#">
                <img class="rounded-t-lg w-full h-56 object-cover" src="{{ asset('images/background/'. rand(1,8) .'.png') }}" alt="" />
            </a>
            <div class="p-5 space-y-4 bg-zinc-50">
                <div>
                    <p class="font-medium mb-3 flex items-center gap-2"><i class="fi fi-rr-diary-bookmark-down"></i><span>Subjects</span></p>
                    <p class="text-sm">{{ $subject->name }}</p>
                </div>
                <hr/>
                <div>
                    <p class="font-medium mb-3 flex items-center gap-2"><i class="fi fi-rr-star"></i><span>Skills</span></p>
                    <ul class="list-disc ps-4 space-y-2">
                        @for($i = 1; $i <=6; $i++)
                            @if($subject['skill'.$i] != null)
                                <li class="text-sm">{{ $subject['skill'.$i] }}</li>
                            @endif
                        @endfor
                    </ul>
                </div>
                <hr/>
                <div class="flex gap-4">
                    <a href="{{ route('subjects.index') }}" class="btn-outline-zinc w-full">Back</a>
                    <a href="{{ route('subjects.edit',$subject->id) }}" class="btn-zinc w-full">Edit</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
