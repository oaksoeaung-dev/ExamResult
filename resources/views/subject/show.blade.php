<x-app-layout>
    <div class="space-y-5">
        <div class="mx-auto max-w-sm overflow-hidden rounded-lg border border-zinc-200 bg-white shadow-lg md:mx-0 lg:mx-0">
            <a href="#">
                <img class="h-56 w-full rounded-t-lg object-cover" src="{{ asset("images/background/" . rand(1, 8) . ".png") }}" alt="" />
            </a>
            <div class="space-y-4 bg-zinc-50 p-5">
                <div>
                    <p class="mb-3 flex items-center gap-2 font-medium">
                        <i class="fi fi-rr-diary-bookmark-down"></i>
                        <span>Subjects</span>
                    </p>
                    <p class="text-sm">{{ $subject->name }}</p>
                </div>
                <hr />
                <div>
                    <p class="mb-3 flex items-center gap-2 font-medium">
                        <i class="fi fi-rr-star"></i>
                        <span>Skills</span>
                    </p>
                    <ul class="list-disc space-y-2 ps-4">
                        @for ($i = 1; $i <=6; $i++)
                            @if ($subject["skill" . $i] != null)
                                <li class="text-sm">{{ $subject["skill" . $i] }}</li>
                            @endif
                        @endfor
                    </ul>
                </div>
                <hr />
                <div class="flex gap-4">
                    <a href="{{ route("subjects.index") }}" class="btn-outline-zinc w-full">Back</a>
                    <a href="{{ route("subjects.edit", $subject->id) }}" class="btn-zinc w-full">Edit</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
