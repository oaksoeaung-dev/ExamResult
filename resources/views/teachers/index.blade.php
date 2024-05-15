<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="flex gap-2 items-center"><i class="fi fi-rr-lesson-class"></i><span>Teachers</span></h1>
        </div>

        <div>
            <x-search></x-search>
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Keyword
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($teachers as $teacher)
                    <tr class="bg-white border-b hover:bg-gray-50 cursor-pointer transition-all duration-300" onclick="window.location.href='{{ route('teachers.show',$teacher->id) }}';">
                        <th class="px-6 py-4 font-normal text-gray-700 whitespace-nowrap">
                            {{ $teacher->name }}
                        </th>
                        <th class="px-6 py-4 font-normal text-gray-700 whitespace-nowrap">
                            {{ $teacher->email }}
                        </th>
                        <th class="px-6 py-4 font-normal text-gray-700 whitespace-nowrap">
                            {{ $teacher->slug }}
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $teachers->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>
