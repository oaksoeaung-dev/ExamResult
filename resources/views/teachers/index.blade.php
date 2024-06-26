<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="flex items-center gap-2">
                <i class="fi fi-rr-lesson-class"></i>
                <span>Teachers</span>
            </h1>
        </div>

        <div>
            <x-search></x-search>
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-left text-sm text-zinc-500">
                <thead class="bg-zinc-100 text-xs uppercase text-zinc-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Keyword</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr
                            class="cursor-pointer border-b bg-white transition-all duration-300 hover:bg-zinc-50"
                            onclick="window.location.href='{{ route("teachers.show", $teacher->id) }}';"
                        >
                            <th class="whitespace-nowrap px-6 py-4 font-normal text-zinc-700">
                                {{ $teacher->name }}
                            </th>
                            <th class="whitespace-nowrap px-6 py-4 font-normal text-zinc-700">
                                {{ $teacher->email }}
                            </th>
                            <th class="whitespace-nowrap px-6 py-4 font-normal text-zinc-700">
                                {{ $teacher->slug }}
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $teachers->links("vendor.pagination.tailwind") }}
            </div>
        </div>
    </div>
</x-app-layout>
