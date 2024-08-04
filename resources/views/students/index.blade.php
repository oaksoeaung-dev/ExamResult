<x-app-layout>
    <div class="space-y-10">
        <div>
            <h1 class="flex items-center gap-2">
                <i class="fi fi-rr-student"></i>
                <span>Students</span>
            </h1>
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-left text-sm text-zinc-500">
                <thead class="bg-zinc-100 text-xs uppercase text-zinc-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr class="cursor-pointer border-b bg-white transition-all duration-300 hover:bg-zinc-50" onclick="window.location.href='{{ route("students.show", $student->id) }}';">
                            <th class="whitespace-nowrap px-6 py-4 font-normal text-zinc-700">
                                {{ $student->name }}
                            </th>
                            <th class="whitespace-nowrap px-6 py-4 font-normal text-zinc-700">
                                {{ $student->email }}
                            </th>
                            <th class="whitespace-nowrap px-6 py-4 font-normal text-zinc-700">
                                {{ $student->phone }}
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
