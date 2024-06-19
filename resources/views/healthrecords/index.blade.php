<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="flex gap-2 items-center"><i class="fi fi-rr-treatment"></i><span>Health Records</span></h1>
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-zinc-500">
                <thead class="text-xs text-zinc-700 uppercase bg-zinc-100">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr class="bg-white border-b hover:bg-zinc-50 cursor-pointer transition-all duration-300" onclick="window.location.href='{{ route('healthrecords.show',$student->id) }}';">
                        <th class="px-6 py-4 font-normal text-zinc-700 whitespace-nowrap">
                            {{ $student->name }}
                        </th>
                        <th class="px-6 py-4 font-normal text-zinc-700 whitespace-nowrap">
                            {{ $student->email }}
                        </th>
                        <th class="px-6 py-4 font-normal text-zinc-700 whitespace-nowrap">
                            {{ $student->phone }}
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

