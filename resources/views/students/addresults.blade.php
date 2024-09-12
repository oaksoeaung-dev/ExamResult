@php
    use Carbon\Carbon;
@endphp

<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="">Add Exam Results</h1>
        </div>

        <form action="{{ route("activities.store") }}" method="post" class="grid grid-cols-3 gap-5">
            @csrf
            <div class="h-fit overflow-hidden rounded-lg bg-white pb-2 shadow-lg">
                <h4 class="bg-teal-400 py-2 text-center text-xl font-semibold text-white">Information</h4>
                <div class="px-5 py-2">
                    <input type="text" class="block w-full rounded-lg border border-zinc-300 bg-white p-2.5 text-sm text-zinc-500 shadow-sm focus:border-zinc-500 focus:ring-zinc-500" value="{{ $student->name }}" disabled />
                </div>
                <div class="px-5 py-2">
                    <input type="text" class="block w-full rounded-lg border border-zinc-300 bg-white p-2.5 text-sm text-zinc-500 shadow-sm focus:border-zinc-500 focus:ring-zinc-500" value="{{ $class->name }}" disabled />
                </div>
                <div class="px-5 py-2">
                    <input type="text" class="block w-full rounded-lg border border-zinc-300 bg-white p-2.5 text-sm text-zinc-500 shadow-sm focus:border-zinc-500 focus:ring-zinc-500" value="{{ Carbon::parse($class->startdate)->format("Y") . " - " . Carbon::parse($class->enddate)->format("Y") }}" disabled />
                </div>
                <div class="px-5 py-2">
                    <input type="text" class="block w-full rounded-lg border border-zinc-300 bg-white p-2.5 text-sm text-zinc-500 shadow-sm focus:border-zinc-500 focus:ring-zinc-500" placeholder="Term" />
                </div>
                <div class="px-5 py-2">
                    <input type="text" class="block w-full rounded-lg border border-zinc-300 bg-white p-2.5 text-sm text-zinc-500 shadow-sm focus:border-zinc-500 focus:ring-zinc-500" placeholder="Campus" />
                </div>
            </div>
            @foreach ($class->subjects()->get() as $subject)
                <div class="h-fit overflow-hidden rounded-lg bg-white pb-2 shadow-lg">
                    <h4 class="bg-teal-400 py-2 text-center text-xl font-semibold text-white">{{ $subject->name }}</h4>
                    <div class="grid grid-cols-2 gap-5 px-5 py-2">
                        <p class="w-full rounded-lg border border-zinc-300 p-2.5 text-sm text-zinc-700">Marks</p>
                        <input type="text" class="block w-full rounded-lg border border-zinc-300 bg-white p-2.5 text-sm text-zinc-900 shadow-sm focus:border-zinc-500 focus:ring-zinc-500" />
                    </div>
                    @for ($i = 1; $i <=6; $i++)
                        @if ($subject["skill" . $i] != null)
                            <div class="grid grid-cols-2 gap-5 px-5 py-2">
                                <p class="w-full rounded-lg border border-zinc-300 p-2.5 text-sm text-zinc-700">
                                    {{ $subject["skill" . $i] }}
                                </p>
                                <input type="text" class="block w-full rounded-lg border border-zinc-300 bg-white p-2.5 text-sm text-zinc-900 shadow-sm focus:border-zinc-500 focus:ring-zinc-500" />
                            </div>
                        @endif
                    @endfor
                </div>
            @endforeach

            <div class="h-fit overflow-hidden rounded-lg bg-white pb-2 shadow-lg">
                <h4 class="bg-teal-400 py-2 text-center text-xl font-semibold text-white">Attendance</h4>

                @for ($i = 1; $i <=12; $i++)
                    <div class="grid grid-cols-2 gap-5 px-5 py-2">
                        <input type="text" class="block w-full rounded-lg border border-zinc-300 bg-white p-2.5 text-sm text-zinc-900 shadow-sm focus:border-zinc-500 focus:ring-zinc-500" value="{{ Carbon::create(null, $i, 1)->format("F") }}" />
                        <input type="text" class="block w-full rounded-lg border border-zinc-300 bg-white p-2.5 text-sm text-zinc-900 shadow-sm focus:border-zinc-500 focus:ring-zinc-500" />
                    </div>
                @endfor
            </div>

            @if ($class->behaviours()->get()->count() != 0)
                <div class="h-fit overflow-hidden rounded-lg bg-white pb-2 shadow-lg">
                    <h4 class="bg-teal-400 py-2 text-center text-xl font-semibold text-white">Behaviours</h4>
                    @foreach ($class->behaviours()->get() as $behaviour)
                        <div class="grid grid-cols-2 gap-5 px-5 py-2">
                            <p class="w-full rounded-lg border border-zinc-300 p-2.5 text-sm text-zinc-700">
                                {{ $behaviour->name }}
                            </p>
                            <input type="text" class="block w-full rounded-lg border border-zinc-300 bg-white p-2.5 text-sm text-zinc-900 shadow-sm focus:border-zinc-500 focus:ring-zinc-500" />
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="mt-5 flex justify-end gap-10">
                {{--
                    <a href="{{ route('activities.index') }}" class="btn-outline-zinc w-full">Cancel</a>
                    <button type="submit" class="btn-zinc w-full">Create</button>
                --}}
            </div>
        </form>
    </div>
</x-app-layout>
